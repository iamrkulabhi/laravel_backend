<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        //dd(User::find(Auth::user()->id)->profile);
        return view('admin.profile.edit', ['profile' => User::find(Auth::user()->id)->profile]);
    }

    public function update(Request $request){
        //dd($request->all());
        $request->validate([
            'phone' => 'required|integer',
            'dob' => 'required|date',
            'gender' => 'required|string'
        ]);

        $loggin_user_id = Auth::user()->id;

        $profile_exists = Profile::where('user_id', $loggin_user_id)->first();

        if(is_null($profile_exists)){
            $profile = Profile::create([
                'phone' => $request->phone,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'user_id' => $loggin_user_id
            ]);
        }else{
            $profile_exists->phone = $request->phone;
            $profile_exists->dob = $request->dob;
            $profile_exists->gender = $request->gender;
            $profile_exists->save();
        }

        return redirect()->route('admin.profile')->with('success', 'profile updated successfully!');
    }
}
