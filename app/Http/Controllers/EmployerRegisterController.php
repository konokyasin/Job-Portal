<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployerRegisterController extends Controller
{
    public function employerRegister(Request $request)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => Str::slug(request('slug'))
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'A verification link is sent to your email. Please follow the link to verify it!');
    }
}
