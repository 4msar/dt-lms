<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:5|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::create([
            "name" => $request->input('name'),
            "username" => $request->input('username'),
            "email" => $request->input('email'),
            "password" => bcrypt($request->input('password')),
            "role" => $request->input('role'),
            "email_verified_at" => (isset($request->email_verify) ? null : now())
        ]);

        if($user){
            $message = ['success' => 'User added successfully!'];
        }else{
            $message = ['warning' => 'Failed to Add!'];
        }
        return back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'username' => 'required|string|min:5|max:255',
            // 'email' => 'required|string|email|max:255',
            'role' => 'required|string',
        ]);

        $user->name = $request->input('name');
        $user->mobile_number = $request->input('mobile_number');
        $user->designation = $request->input('designation');
        $user->work_at = $request->input('work_at');
        $user->mailing_address = $request->input('mailing_address');
        $user->role = $request->input('role');

        if($user->save()){
            $message = ['success' => 'User updated successfully!'];
        }else{
            $message = ['warning' => 'Failed to update!'];
        }
        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            $message = ['success' => 'User deleted successfully!'];
        }else{
            $message = ['warning' => 'Failed to delete!'];
        }
        return back()->with($message);
    }
}
