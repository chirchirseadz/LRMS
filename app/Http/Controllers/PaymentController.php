<?php

namespace App\Http\Controllers;

use App\Models\AssignTransaction;
use App\Models\C2bPayments;
use App\Models\Mpesa;
use App\Models\StkRequest;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    //
    // private $token;

    
    // public function __construct(){
    //     $data = new Mpesa();
    //     $this->token = $data->generateAccessToken();

    // }

    public function initiateStkpush(){

        $data = new Mpesa();
        // $phoneNumber= 254759666898;
        $phoneNumber = 254790651941;
        $amount= 1;
        $transactionDescription = 'Stk Push ';
        $refference = 'Rent Payments';
        $data->sendSTKPush($phoneNumber, $amount, $refference, $transactionDescription);
        return response('Kindly complete the transaction using the stkpush notification on your phone');
        
    }
    public function stkCallback(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('stk.txt',$data);

        $response=json_decode($data);

        $ResultCode=$response->Body->stkCallback->ResultCode;

        if($ResultCode==0){
            $MerchantRequestID=$response->Body->stkCallback->MerchantRequestID;
            $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
            $ResultDesc=$response->Body->stkCallback->ResultDesc;
            $Amount=$response->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $MpesaReceiptNumber=$response->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            //$Balance=$response->Body->stkCallback->CallbackMetadata->Item[2]->Value;
            $TransactionDate=$response->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $PhoneNumber=$response->Body->stkCallback->CallbackMetadata->Item[3]->Value;

            $payment=Stkrequest::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();
            $payment->status='Paid';
            $payment->TransactionDate=$TransactionDate;
            $payment->MpesaReceiptNumber=$MpesaReceiptNumber;
            $payment->ResultDesc=$ResultDesc;
            $payment->Amount=$Amount;
            $payment->MerchantRequestID=$MerchantRequestID;
            $payment->CheckoutRequestID=$CheckoutRequestID;
            $payment->PhoneNumber=$PhoneNumber;
            $payment->save();

        }else{

        $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
        $ResultDesc=$response->Body->stkCallback->ResultDesc;
        $payment=StkRequest::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();
        
        $payment->ResultDesc=$ResultDesc;
        $payment->status='Failed';
        $payment->save();

        }

    }

    public function Validation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('validation.txt',$data);

        //validation logic
        
        return response()->json([
            'ResultCode'=>0,
            'ResultDesc'=>'Accepted'
        ]);
        
        /*
        return response()->json([
            'ResultCode'=>'C2B00011',
            'ResultDesc'=>'Rejected'
        ])
        */
    }

    public function Confirmation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('confirmation.txt',$data);
        //save data to DB
        $response=json_decode($data);
        $TransactionType=$response->TransactionType;
        $TransID=$response->TransID;
        $TransTime=$response->TransTime;
        $TransAmount=$response->TransAmount;
        $BusinessShortCode=$response->BusinessShortCode;
        $BillRefNumber=$response->BillRefNumber;
        $InvoiceNumber=$response->InvoiceNumber;
        $OrgAccountBalance=$response->OrgAccountBalance;
        $ThirdPartyTransID=$response->ThirdPartyTransID;
        $MSISDN=$response->MSISDN;
        $FirstName=$response->FirstName;
        $MiddleName=$response->MiddleName;
        $LastName=$response->LastName;

        $c2b=new C2bPayments();
        $c2b->TransactionType=$TransactionType;
        $c2b->TransID=$TransID;
        $c2b->TransTime=$TransTime;
        $c2b->TransAmount=$TransAmount;
        $c2b->BusinessShortCode=$BusinessShortCode;
        $c2b->BillRefNumber=$BillRefNumber;
        $c2b->InvoiceNumber=$InvoiceNumber;
        $c2b->OrgAccountBalance=$OrgAccountBalance;
        $c2b->ThirdPartyTransID=$ThirdPartyTransID;
        $c2b->MSISDN=$MSISDN;
        $c2b->FirstName=$FirstName;
        $c2b->MiddleName=$MiddleName;
        $c2b->LastName=$LastName;
        $c2b->save();

        return response()->json([
            'ResultCode'=>0,
            'ResultDesc'=>'Accepted'
        ]);
        
    }


    public function allMpesaC2BTransactions() {

        $user = User::find(auth()->user()->id);
        if (!$user->can('view mpesa-transactions')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = C2bPayments::all();
        $tenants = Tenants::all();

        $pageData = [
            'title' => 'C2B Mpesa transactions',
            'C2bPayments' => $data,
            'tenants' => $tenants
        ];

        return view('transactions.allMpesaTransactions', $pageData);
    }


    public function allocatePaymentToTenant(Request $request, $paymentId)
    {

        $user = User::find(auth()->user()->id);

        if (!$user->can('view mpesa-transactions')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        // Find the payment
        $payment = C2bPayments::findOrFail($paymentId);
 
        // Create a new tenant payment record
    
        $data = new AssignTransaction();
        $data->tenant_id = $request->tenant_id;
        $data->c2b_payments_id = $payment->id;
        $data->amount = $request->amount;
        $data->save();

        $tenant = Tenants::find($request->tenant_id); 

        if(!$tenant){
            toastr()->error('No tenant found !');
            return redirect(route('allMpesaTransactions'));
        }
        
        toastr()->success('Successfully allocated payments for '. $tenant->full_name);
        return redirect(route('allMpesaTransactions'));
    }

}
