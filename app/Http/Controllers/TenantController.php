<?php

namespace App\Http\Controllers;

use App\Models\Tenants;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tenants = Tenants::all();
        $pageData = [
            'title' => 'tenants List',
            'tenants' => $tenants,
        ];
        return view('tenants.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create tenants')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $appartmentId = request()->query('appartmentId');
        $pageData = [
            'title' => 'create tenant page',
            'appartmentId' => $appartmentId
        ];

        return view('tenants.create', $pageData);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $user = User::find(auth()->user()->id);
        if (!$user->can('create tenants')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'appartment_id' => 'required',
            'id_number' => 'required',
            'address' => 'required',
            'occupation' => 'required'
        ]);

        $data = new Tenants();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->appartments_id = $request->appartment_id;
        $data->id_number = $request->id_number;
        $data->address = $request->address;
        $data->occupation = $request->occupation;
        $data->save();

        toastr()->success('Successfully added tenant details');
        return redirect(route('appartment.show', $request->appartment_id));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find(auth()->user()->id);

        if (!$user->can('view tenants')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $tenant = Tenants::find($id);

        // dd($tenant);
        
        $cashPayments = $tenant->CashPayments;
        $mpesaPayments = $tenant->C2bPayments;
        $appartment = $tenant->Appartments;
        

        $pageData = [
            'title' => $tenant->name . ' Details',
            'tenant' => $tenant,
            'cashPayments' => $cashPayments,
            'mpesaC2B' => $mpesaPayments,  
            'appartment' => $appartment,  
           
        ];

        // dd($pageData);

        return view('tenants.show', $pageData);
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
