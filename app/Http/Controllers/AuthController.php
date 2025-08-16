<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;      // ✅ for DB::table()
use Illuminate\Support\Facades\Hash;    // ✅ for Hash::make() and Hash::check()
use App\Models\User;                    // ✅ for User model

class AuthController extends Controller
{
    public function showSetPasswordForm(Request $request)
    {
        return view('auth.set-password', [
            'token' => $request->query('token'),
            'email' => $request->query('email'),
        ]);
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        // Update password
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // Delete token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password set successfully. You can now login.');
    }
}
