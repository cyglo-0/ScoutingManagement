<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'age'          => ['required', 'integer', 'min:10', 'max:100'],
            'phone_number' => ['required', 'string', 'max:20'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender'       => ['required', 'in:male,female,other'],
            'birthday'     => ['required', 'date'],
            'school'       => ['required', 'string'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'role'         => ['required', 'in:scout_leader,senior_scout'],
            'rank'         => ['nullable', 'string', 'max:255'],
        ]);

        $status = ($request->role === 'scout_leader') ? 'pending' : 'approved';

        $user = User::create([
            'name'         => $request->name,
            'age'          => $request->age,
            'phone_number' => $request->phone_number,
            'email'        => $request->email,
            'gender'       => $request->gender,
            'birthday'     => $request->birthday,
            'school'       => $request->school,
            'password'     => Hash::make($request->password),
            'role'         => $request->role,
            'rank'         => $request->rank,
            'status'       => $status,
        ]);

        if ($user->status === 'pending') {
            return redirect()->route('login')->with('status', 'Thank you for signing up! Please wait while the Admin confirms your identity.');
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }   
}