<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Flats;
use App\Models\LandLord;
use App\Models\User;
use Illuminate\Http\Request;

class FlatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $flats = Flats::with('LandLord')->get();
        // $flats = Flats::with('LandLord')->get();


        $pageData = [
            'title' => 'flats List',
            'flats' => $flats
        ];
        return view('flats.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('create flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $landlords = LandLord::all();

        $pageData = [
            'title' => 'Create flat',
            'landlords' => $landlords

        ];


        return view('flats.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('create flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        // dd($request);
        $request->validate([
            'name' => 'required',
            'landlord_id' => 'required',
            'location' => 'required',

        ]);

        $data = new Flats();
        $data->name = $request->name;
        $data->land_lord_id = $request->landlord_id;
        $data->location = $request->location;
        $data->save();

        toastr()->success('Successfully added a flat');
        return redirect(route('flat.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('view flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        $flat = Flats::with('Appartments.Categories')->find($id);
          
         $pageData = [
            'title' => 'flat/plot details Page',
            'flat' => $flat,
        
        ];

        
        return view('flats.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('edit flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }


        $flat = Flats::find($id);
        $landlords = LandLord::all();
        $pageData = [
            'title' => 'flat Edit Page',
            'flat' => $flat,
            'landlords' => $landlords

        ];

        return view('flats.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request);

        // Check if the user has the required permission
        $user = User::find(auth()->user()->id);

        if (!$user->can('edit flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect(route('flat.show', $request->flat_id));
        }
        // dd($request);
        $request->validate([
            'name' => 'required',
            'landlord_id' => 'required',
            'location' => 'required',

        ]);

        $data = new Flats();
        $data->name = $request->name;
        $data->landlord_id = $request->landlord_id;
        $data->location = $request->location;
        $data->update();

        toastr()->success('Successfully updated a flat');
        return redirect(route('flat.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //        
        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('delete flats')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $flat = Flats::find($id);
        $flat->delete();
        toastr()->success('Successfully deleted a flat');
        return redirect()->back();
    }
}
