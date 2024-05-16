<?php

namespace App\Http\Controllers;

use App\Models\LandLord;
use App\Models\User;
use Illuminate\Http\Request;

class LandLordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $landlords = LandLord::orderBy('created_at', 'desc')->get();
        $pageData = [
            'title' => 'land lord List',
            'landlords' => $landlords

        ];
        return view('landLords.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $pageData = [
            'title' => 'Create Land-lord data',
        ];

        return view('landLords.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'identification_number' => 'required',
        ]);

        $data = new LandLord();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->identification_number = $request->identification_number;
        $data->save();
        toastr()->success('Successfully added land-lord data');
        return redirect(route('landlord.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $user = User::find(auth()->user()->id);

        if (!$user->can('view landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = LandLord::find($id);
    
        $pageData = [
            'title' => strtoupper($data->full_name). ' details',
            'landlord' => $data,
           
        ];

        return view('landLords.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }      
        $user = User::find(auth()->user()->id);

        if (!$user->can('view landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = LandLord::find($id);
    
        $pageData = [
            'title' => strtoupper($data->name),
            'landlord' => $data,
           
        ];

        return view('landLords.edit', $pageData);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'identification_number' => 'required',
        ]);

        $data = LandLord::find($id);

        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->identification_number = $request->identification_number;
        $data->update();
        toastr()->success('Successfully updated land-lord data');
        return redirect(route('landlord.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit landlords')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = LandLord::find($id);
        $data->delete();
        toastr()->success('Successfully deleted the land lord');
        return redirect(route('landlord.index'));
    }
}
