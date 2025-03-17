<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auths.register",[
            "title"=> "Gov-Emp | Register"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'fullname'=> 'required|max:255',
            'nickname'=> 'required|max:255',
            'email'=> 'required|email:dns|unique:users,email',
            'password'=> [
                'required',
                'confirmed',
                Password::min(8)
                ->numbers()
                ->symbols()
                ->mixedCase()
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('register.index')->withErrors($validator)->withInput();
        }

        $dataToStore = [
            'fullname' => $request['fullname'],
            'nickname' => $request['nickname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];

        User::create($dataToStore);

        session()->flash('success', 'Registration Successfull! Please Login');

        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));

        $this->cookie();
        return redirect()->route('login')->with('success', 'Registration Successful! Please Login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }

    /**
     * Cookie for login info.
     */
    protected function cookie()
    {
        Cookie::queue(Cookie::forget('laravel_session'));
    }
}
