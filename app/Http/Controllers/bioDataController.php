<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Roksta\Toastr\Toastr;

class bioDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Check if the data is already cached

        $currentYear = date('Y');
        $currentMonth = date('m');
        $lastRecord = BioData::latest()->first();
        $nextNumber = $lastRecord ? ($lastRecord->id + 1) : 1;
        $hospitalNumber = "{$nextNumber}/{$currentMonth}/{$currentYear}";

        if (Cache::has('biData')) {
            $bioData = BioData::all();
        } else {
            // Data not cached, fetch it from the database


            if (!Auth::user()->can('view bioData')) {
                return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
            }

            $bioData = BioData::all();

            Cache::put('bioData', $bioData, 3600);

            $pageData = [
                'title' => 'Bio Data Listings',
                'bioData' => $bioData,
                'hospitalNumber' => $hospitalNumber
            ];

            return view('bioData.index', $pageData);

        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pageData = [
            'title' => 'Bio Data Create',
        ];
        return view('bioData.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BioData $data)
    {
        //
        if (!Auth::user()->can('create bioData')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }

        $request->validate([
            'hospitalNumber' => 'required|unique:bio_data,hospitalNumber',
            'firstName' => 'required',
            'lastName' => 'required',
            'idNumber' => 'required|unique:bio_data,hospitalNumber',
            'phoneNumber' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);

        $data->hospitalNumber = $request->input('hospitalNumber');
        $data->firstName = $request->input('firstName');
        $data->lastName = $request->input('lastName');
        $data->idNo = $request->input('idNumber');
        $data->phoneNumber = $request->input('phoneNumber');
        $data->gender = $request->input('gender');
        $data->level = $request->input('level');
        $data->residence = $request->input('residence');
        $data->action_by = Auth::user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Bio Data added successfully !');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $data = BioData::find($id);

        $pageData = [
            'title' => 'Patient details',
            'dioData' => $data
        ];

        return view('bioData.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BioData $data)
    {
        //
        $pageData = [
            'dioData' => $data
        ];
        return view('bioData.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BioData $data)
    {
        //
        if (!Auth::user()->can('update bioData')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }

        $request->validate([
            'hospitalNumber' => 'required|unique:bio_data,hospitalNumber',
            'firstName' => 'required',
            'lastName' => 'required',
            'idNumber' => 'required|unique:bio_data,hospitalNumber',
            'phoneNumber' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);

        $data->hospitalNumber = $request->input('hospitalNumber');
        $data->firstName = $request->input('firstName');
        $data->lastName = $request->input('lastName');
        $data->idNo = $request->input('idNumber');
        $data->phoneNumber = $request->input('phoneNumber');
        $data->gender = $request->input('gender');
        $data->level = $request->input('level');
        $data->residence = $request->input('residence');
        $data->action_by = Auth::user()->id;
        $data->update();

        return redirect()->back()->with('success', 'Bio Data updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 
        $data = BioData::find($id);
        if (!Auth::user()->can('delete bioData')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }
        $data->delete();
        return redirect()->route('bioData.index')->with('success', 'Bio Data deleted successfully ');
    }
}
