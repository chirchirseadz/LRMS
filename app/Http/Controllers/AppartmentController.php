<?php

namespace App\Http\Controllers;

use App\Models\Appartments;
use App\Models\Rooms;
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

        $pageData = [
            'title' => 'Create Appartment', 
        
        ];
        return view('appartment.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
        ]);

        $data = new Appartments();
        $data->name = $request->name;
        $data->save();
        toastr()->success('Successfully added appartment');
        return redirect(route('appartment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = Appartments::find($id);
        $rooms = $data->Rooms;

        $pageData = [
            'title' => strtoupper($data->name), 
            'appartment' => $data,
            'rooms' => $rooms
        ];

        // dd($rooms);

        // dd($pageData);
        return view('appartment.show', $pageData);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Appartments::find($id);

        $pageData = [
            'title' => 'EDIT'. $data->name, 
            'appartment' => $data 
        
        ];
        return view('appartment.edit', $pageData);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $data = new Appartments();
        $data->name = $request->name;
        $data->update();
        toastr()->success('Successfully updated appartment');
        return redirect(route('appartment.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
