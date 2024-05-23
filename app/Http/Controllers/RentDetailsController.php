<?php

namespace App\Http\Controllers;

use App\Models\RentDetails;
use App\Models\User;
use Illuminate\Http\Request;

class RentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('view rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = RentDetails::orderBy('created_at', 'desc')->get();

        $pageData = [
            'title' => 'Rent details',
            'rent_details' => $data,
        ];
        // dd($data);
        return view('rent_details.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $pageData = [
            'title' => 'create rent details',      
        ];


        return view('rent_details.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required',
            'overdue_date' => 'required'
        ]);

        $data = new RentDetails();
        $data->name = $request->name;
        $data->overdue_date = $request->overdue_date;
        $data->save();

        toastr()->success('Successfully created rent details !');
        return redirect(route('rent_details.index'));
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
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $rent_detail = RentDetails::find($id);

        $pageData = [
            'title' => 'Edit rent details',  
            'rent_detail' => $rent_detail
        ];

        return view('rent_details.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       
        $user = User::find(auth()->user()->id);
        if (!$user->can('create rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required',
            'overdue_date' => 'required'
        ]);

        $data = RentDetails::find($id);
        $data->name = $request->name;
        $data->overdue_date = $request->overdue_date;
        $data->save();

        toastr()->success('Successfully updated rent details !');
        return redirect(route('rent_details.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('delete rent-details')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = RentDetails::find($id);
        $data->delete();

        toastr()->success('Successfully deleted rent details');
        return redirect(route('rent_details.index'));

    }
}
