<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auths.forgotpasswordvalidation", [
            "title" =>"Forgot Password"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = session('user_email_validation');

        if (!$user) {
            return redirect()->route('forgot-password.index');
        }

        return view("auths.resetpassword", [
            "title" =>"Reset Password",
            "user"=> $user
        ]);
    }

    /**
     * Validate Email Address.
     */
    public function validation(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
        ]);

        $user = User::where('email', $request->email)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email not found.',
            ]);
        }

        session(['user_email_validation' => $user]);

        return redirect()->route('reset-password.create');
    }

    /**
     * Password Reset.
     */
    public function reset(Request $request)
    {
        $user = session('user_email_validation');
        $oldPassword = $user->password;

        $request->validate([
            'new_password' => [
                'required',
                'confirmed',
                'different:password',
                Password::min(8)
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
            ],
        ]);

        if (Hash::check($request->new_password, $oldPassword)) {
            return back()->withErrors([
                'new_password' => 'The new password must be different from the old password.',
            ]);
        }

        $hashedPassword = Hash::make($request->new_password);
        $user->update([
            'password' => $hashedPassword,
        ]);

        session()->forget('reset');

        return redirect()->route('login')->with('success', 'Password reset successful. Please login with your new password!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
