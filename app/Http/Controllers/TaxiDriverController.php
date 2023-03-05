<?php

namespace App\Http\Controllers;

use App\Models\TaxiDriver;
use Illuminate\Http\Request;

class TaxiDriverController extends Controller
{
    public function index (){
        return view('taxidrivers.index');
    }

    public function create() {
        return view('taxidrivers.signup');
    }
   /*
    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $taxiDriver = TaxiDriver::create($formFields);

        // Login
        auth()->login($taxiDriver);

        return redirect('/taxidriver')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/taxidriver')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('taxidrivers.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/taxidriver')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['phoneNumber' => 'Invalid Credentials'])->onlyInput('phoneNumber');
    }*/
}
