<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\InviteAttendantMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;       

class AttendantController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'fullName' => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'phone'    => 'required|string|max:20',
    ]);

    // Create user without password
    $user = User::create([
        'name'  => $request->fullName,
        'email' => $request->email,
        'phone' => $request->phone,
        'role'  => 'attendant',
    ]);

    // Generate token (reuse password_reset_tokens table)
    $token = Str::random(64);
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $user->email],
        ['token' => Hash::make($token), 'created_at' => now()]
    );

    // Send email
    Mail::to($user->email)->send(new InviteAttendantMail($token, $user->email));

    return back()->with('success', 'Attendant invited successfully.');
}

}
