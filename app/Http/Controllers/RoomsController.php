<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Rooms::orderBy('created_at', 'desc')->get();
        $pageData = [
            'title' => 'rooms List', 
            'rooms' => $rooms 

        ];
        return view('rooms.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categories::all();

        $appartmentId = request()->query('appartment_id');

        $pageData = [
            'title' => 'Create Room', 
            'categories' => $categories,
            'appartmentId' =>   $appartmentId
        ];

    
        return view('rooms.create', $pageData);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request);
        $request->validate([
            'name' => 'required',
            'amount'  => 'required|string',
            'category' => 'required|integer',
            'appartment_id' => 'required|integer',
        ]);

        $data = new Rooms();
        $data->category_id = $request->category;
        $data->appartments_id = $request->appartment_id;
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->save();
        toastr()->success('Successfully added a room');
        return redirect(route('appartment.show', $request->appartment_id));

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
