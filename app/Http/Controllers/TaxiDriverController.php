<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\TaxiDriver;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaxiDriverController extends Controller
{
    public function index (){
        return view('taxidrivers.index');
    }

    public function create() {
        return view('taxidrivers.signup');
    }

    // Show Login Form
    public function login() {
        return view('taxidrivers.login');
    }

    // Create New User
    public function store(Request $request) {
        $formFieldsTaxiDriver = $request->validate([
            'firstName' => ['required', 'min:3'],
            'secondName' => ['required', 'min:3'],
            'birthday' => ['required', 'date', 'before:' . Carbon::now()->subYears(18)->toDateString()],
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:19',
            'password' => 'required|confirmed|min:6',

        ]);
        $formFieldsCar = $request->validate([
            'brand'=> ['required','string'],
            'plates'=> ['required','string'],
            'color'=> ['required','string'],
            'carClass'=> ['required','integer','between:1,3'],

        ]);
        // Hash Password
        $formFieldsTaxiDriver['password'] = bcrypt($formFieldsTaxiDriver['password']);

        $car = Car::create($formFieldsCar);
        $formFieldsTaxiDriver['carDriving'] = $car->id;
        // Create TaxiDriver
        $taxiDriver = TaxiDriver::create($formFieldsTaxiDriver);

        // Login
        auth()->login($taxiDriver);
        return redirect()->route('taxidriver.show', ['id' => $taxiDriver->id])
            ->with('message', 'Your account has been created, you are logged in');
    }

    public function show(int $id) {
        if($id!= auth()->id()) {
            abort(403, 'Unauthorized Action');
        } else {
            $taxiDriver = TaxiDriver::find(auth()->id())->getAttributes();
            $car = Car::find($taxiDriver['carDriving']);
            $orders = Order::where('class', $car->carClass)->where('orderStatus', Order::STATE_NEW)->get();
            $hisOrders = Order::where('taxiDriverId', $taxiDriver['id'])
                ->whereIn('orderStatus', [Order::STATE_ACCEPTED, Order::STATE_IN_PROGRESS])
                ->get();

            return view('taxidrivers.show', [
                'taxiDriver' => $taxiDriver,
                'orders' => $orders,
                'hisOrders' => $hisOrders,
                'car' => $car,
            ]);
        }

    }

    // Authenticate TaxiDriver
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'phoneNumber' => 'required',//|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required'
        ]);
        $taxiDriver = TaxiDriver::where('phoneNumber', $formFields['phoneNumber'])->first();
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->route('taxidriver.show', ['id' => $taxiDriver->id])
                ->with('message', 'Your account has been created, you are logged in');
        }

        return back()->withErrors(['phoneNumber' => 'Invalid Credentials'])->onlyInput('phoneNumber');
    }
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('taxidriver')->with('message', 'You have been logged out!');

    }
}
