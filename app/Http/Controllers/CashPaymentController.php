<?php

namespace App\Http\Controllers;

use App\Models\CashPayments;
use App\Models\Tenants;
use Illuminate\Http\Request;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cashPayments = CashPayments::all();

        $pageData = [
            'title' => 'Cash Payments page',
            'cashPayments' => $cashPayments
        ];
        return view('cash.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
