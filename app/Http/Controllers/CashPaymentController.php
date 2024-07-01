<?php

namespace App\Http\Controllers;

use App\Models\CashPayments;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Http\Request;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    
    public function index()
    {
        //
        $cashPayments = CashPayments::with('Tenants')->get();

        $pageData = [
            'title' => 'Cash Payments page',
            'cashPayments' => $cashPayments
        ];
        
        // dd($cashPayments);

        return view('cash.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);

        if (!$user->can('create payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $tenants = Tenants::all();

        $pageData = [
            'title' => 'Make payments page',
            'tenants' => $tenants

        ];

        return view('cash.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!$user->can('create payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $request->validate([
            'tenant_id' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        $cash = new CashPayments();
        $cash->tenants_id = $request->tenant_id;
        $cash->amount = $request->amount;
        $cash->payment_date = $request->date;
        $cash->save();

        $tenant = Tenants::find($request->tenant_id);
        toastr()->success('Successfully created payments for '. $tenant->full_name);
        return redirect(route('cash.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find(auth()->user()->id);

        if (!$user->can('create payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        $payment = CashPayments::find($id);

        $pageData = [
            'title' => 'payment date',
            'payment' => $payment
        ];

        return view('cash.show', $pageData);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find(auth()->user()->id);

        if (!$user->can('edit payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        $tenants = Tenants::all();
        $payment =CashPayments::with('Tenants')->find($id);

        $pageData = [
            'title' => 'Make payments page',
            'payment' => $payment,
            'tenants' => $tenants

        ];

      
        return view('cash.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CashPayments $cash)
    {
        //
        $user = User::find(auth()->user()->id);

        if (!$user->can('edit payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $request->validate([
            'tenant_id' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        $cash->tenants_id = $request->tenant_id;
        $cash->amount = $request->amount;
        $cash->payment_date = $request->date;
        $cash->update();

        $tenant = Tenants::find($request->tenant_id);
        toastr()->success('Successfully updated payments for '. $tenant->full_name);
        return redirect(route('cash.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find(auth()->user()->id);

        if (!$user->can('delete payments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

      $payment = CashPayments::find($id);
      $payment->delete();

      toastr()->success('Payment deleted successfully ');
      return redirect(route('cash.index'));
    }
}
