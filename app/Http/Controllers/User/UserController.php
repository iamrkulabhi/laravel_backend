<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        $users = User::all();
        return view('admin.user.show', ['users' => $users]);
    }

    public function add(){
        return view('admin.user.add');
    }

    public function on_add(Request $request){
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('admin.user.show')->with('success', 'User created successfully!');
    }

    public function edit(){
        return view('admin.user.edit');
    }

    public function on_edit(Request $request){

    }
}
