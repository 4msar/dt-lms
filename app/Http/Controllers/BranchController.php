<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(20);
        return view('branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('branch.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:200', 
            'area' => 'required|string|max:200', 
            'map_link' => 'required|string', 
            'contact_person_id' => 'required|integer', 
            'contact_number' => 'required', 
            'close_days' => 'required', 
            'open_time' => 'required'
        ]);

        $branch = Branch::create([
            'address' => $request->input('address'),
            'area' => $request->input('area'),
            'map_link' => $request->input('map_link'),
            'contact_person_id' => $request->input('contact_person_id'),
            'contact_number' => $request->input('contact_number'),
            'close_days' => Branch::array_in_string($request->input('close_days')),
            'open_time' => $request->input('open_time'),
        ]);

        if($branch){
            $message = ['success' => 'Branch added successfully!'];
        }else{
            $message = ['warning' => 'Failed to Add!'];
        }
        return back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        if(request()->get('show') == 'books'){
            return view('branch.books', compact('branch'));
        }
        return view('branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $users = User::all();
        return view('branch.edit', compact('branch', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'address' => 'required|string|max:200', 
            'area' => 'required|string|max:200', 
            'map_link' => 'required|string', 
            'contact_person_id' => 'required|integer', 
            'contact_number' => 'required', 
            'close_days' => 'required', 
            'open_time' => 'required'
        ]);

        $branch->address = $request->input('address');
        $branch->area = $request->input('area');
        $branch->map_link = $request->input('map_link');
        $branch->contact_person_id = $request->input('contact_person_id');
        $branch->contact_number = $request->input('contact_number');
        $branch->close_days = Branch::array_in_string($request->input('close_days'));
        $branch->open_time = $request->input('open_time');
        $branch->save();

        if($branch){
            $message = ['success' => 'Branch updated successfully!'];
        }else{
            $message = ['warning' => 'Failed to update!'];
        }
        return redirect()->route('branches.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if($branch->delete()){
            $message = ['success' => 'Branch deleted successfully!'];
        }else{
            $message = ['warning' => 'Failed to delete!'];
        }
        return back()->with($message);
    }
}
