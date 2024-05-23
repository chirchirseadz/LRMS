<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpesa extends Model
{
    use HasFactory;


    private $access_token;

    private $consumerSecret;
    private $consumerKey;

    private $domain;

    private $passkey;

    private $stkUrl;

    private $callbackUrl;

    private $confirmationUrl;

    private $validationUrl;

    private $shortCode;



    public function __construct(){

        $mpesa_env = env('MPESA_ENVIRONMENT');
         
        $this->consumerSecret = env('MPESA_CONSUMER_SECRET');
        $this->consumerKey = env('MPESA_CONSUMER_KEY');
        $this->domain = $mpesa_env == 'production'  ? 'https://api.safaricom.co.ke': 'https://sandbox.safaricom.co.ke';
        $this->passkey = env('MPESA_PASSKEY');
        $this->shortCode = env('MPESA_SHORTCODE');
        $this->callbackUrl = env('MPESA_CALLBACK_URL');
        
    }

    public function generateAccessToken()
    {
        $consumerKey = $this->consumerKey; 
        $consumerSecret = $this->consumerSecret;
        $domain = $this->domain;
        $url = (string)$domain.'/oauth/v1/generate?grant_type=client_credentials';
        $response = Http::withBasicAuth($consumerKey, $consumerSecret)->get($url);
        $access_token = $response['access_token'];

        return $access_token; 
    }

    public function sendSTKPush($phoneNumber, $amount, $refference ,$transactionDescription){
        $utils = new Utils();
        $accessToken = $this->generateAccessToken();
        $phoneNumber = $utils->validatePhoneNumber($phoneNumber);
        $BusinessShortCode = $this->shortCode;        
        $url = (string)$this->domain.'/mpesa/stkpush/v1/processrequest';

        $PassKey = $this->passkey;
        $Timestamp = Carbon::now()->format('YmdHis');
        $password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
       
        $CallbackUrl = $this->callbackUrl;
        $TransactionType = 'CustomerBuyGoodsOnline'; 

        $Amount = $amount;
        $PartyA = $phoneNumber;
        $PartyB = $this->shortCode;
        $PhoneNumber = (int)$phoneNumber;
        $AccountReference = $refference;
        $TransactionDesc = $transactionDescription;

        try {
            $response = Http::withToken($accessToken)->post($url, [
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $password,
                'Timestamp' => $Timestamp,
                'TransactionType' => $TransactionType,
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'PhoneNumber' => $PhoneNumber,
                'CallBackURL' => $CallbackUrl,
                'AccountReference' => $AccountReference,    
                'TransactionDesc' => $TransactionDesc
            ]);
        } catch (\Throwable $e) {
            return response ($e->getMessage(), 500);
        }


        $res = json_decode($response);

        if($res){

            $ResponseCode = $res->ResponseCode;
        }
        if ($ResponseCode == 0) {
            $MerchantRequestID = $res->MerchantRequestID;
            $CheckoutRequestID = $res->CheckoutRequestID;
            $CustomerMessage = $res->CustomerMessage;

            //save to database
            $payment = new Stkrequest;
            $payment->phone = $PhoneNumber;
            $payment->amount = $Amount;
            $payment->reference = $AccountReference;
            $payment->description = $TransactionDesc;
            $payment->MerchantRequestID = $MerchantRequestID;
            $payment->CheckoutRequestID = $CheckoutRequestID;
            $payment->status = 'Requested';
            $payment->save();

            return $CustomerMessage;
        }

    }







}
