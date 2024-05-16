<?php

namespace App\Http\Controllers;

use App\Models\Appartments;
use App\Models\Categories;
use App\Models\LandLord;
use App\Models\Rooms;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $appartments = Appartments::orderBy('created_at', 'desc')->get();
        $pageData = [
            'title' => 'Appartments List',
            'appartments' => $appartments

        ];
        return view('appartment.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $flatId = request()->query('flatId');
        $categories = Categories::all();

        $pageData = [
            'title' => 'Create Appartment',
            'flatId' => $flatId,
            'categories' => $categories
        ];

        return view('appartment.create', $pageData);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  

        $user = User::find(auth()->user()->id);
        if (!$user->can('create apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $request->validate([
            'name' => 'required',
            'flatId' => 'required',
            'category' => 'required',
            'amount' => 'required'
        ]);

        $data = new Appartments();
        $data->name = $request->name;
        $data->flats_id = $request->flatId;
        $data->categories_id = $request->category;
        $data->amount = $request->amount;
        $data->save();

        toastr()->success('Successfully added appartment');
        return redirect(route('flat.show', $request->flatId));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $user = User::find(auth()->user()->id);

        if (!$user->can('view apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = Appartments::find($id);
        $tenant = $data->Tenants;

        $pageData = [
            'title' => $data->name . ' Details & Tenants',
            'appartment' => $data,
            'tenant' => $tenant
            
        ];

        // dd($data);
       
        
        return view('appartment.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = Appartments::find($id);
        $categories = Categories::all();

        $pageData = [
            'title' => 'EDIT' . $data->name,
            'appartment' => $data,
            'categories' => $categories 

        ];
        return view('appartment.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       
        $user = User::find(auth()->user()->id);
        if (!$user->can('create apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }
        
        $request->validate([
            'name' => 'required',
            'flatId' => 'required',
            'category' => 'required',
            'amount' => 'required'
        ]);

        $data = Appartments::find($id);
        $data->name = $request->name;
        $data->flats_id = $request->flatId;
        $data->categories_id = $request->category;
        $data->amount = $request->amount;
        $data->update();

        toastr()->success('Successfully updated an appartment');
        return redirect(route('flat.show', $request->flatId));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('delete apartments')) {
            toastr()->error('OOPS ! No permissions');
            return redirect()->back();
        }

        $data = Appartments::find($id);
   

        $data->delete();
        toastr()->success('Successfully deleted appartment');
        return redirect()->back();

    }
}
