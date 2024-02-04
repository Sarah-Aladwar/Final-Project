<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('admin.users', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' =>'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:8|max:255',
        ]);

        $data['active'] = isset($request['active']);
        //$data['password'] = bcrypt($data['password']);  //not needed since the hashing is done in the model
        $data['email_verified_at'] = now();
        $data['image'] = 'person.png';

        User::create($data);
        return redirect()->route('users');
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
        $user = User::findOrFail($id);
        return view('admin.updateuser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' =>'required|string|max:255|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:255',
        ]);

        $data['active'] = isset($request['active']);

        if(!empty($data['password'])){ // if the user doesn't want to update the password, the empty field won't be hashed and the password won't change
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        } 

        User::where('id', $id)->update($data);   
     
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
