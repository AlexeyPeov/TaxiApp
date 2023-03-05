<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Order;
use App\Models\TaxiDriver;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class OrderController extends Controller
{

    public function index (){
        $phone = session('phoneNum');
        $customer = Customer::where('phoneNumber', $phone)->first();
        $orders = Order::where('customerId', $customer->id)
            ->where('orderStatus', '!=',  0)-> where('orderStatus', '!=', 4)
            ->get();

        $taxiDriver = null;
        $car = null;
        foreach ($orders as $order) {
            if($order->taxiDriverId != null){
                $taxiDriver = TaxiDriver::where('id', $order->taxiDriverId);
            }
            //var_dump($order->taxiDriverId);
        }
        if($taxiDriver != null){
            $car = Car::where('taxiDriverId', $taxiDriver->id);
        }


        return view('orders.index')
            ->with('customer', $customer)
            ->with('orders', $orders)
            ->with('taxiDriver', $taxiDriver)
            ->with('car', $car);
    }

    public function submit(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $phone = $request->input('phone');
        $class = $request->input('carClass');
        $name = $request->input('name');

        $customer = Customer::where('phoneNumber', $phone)->first();
        //проверить был ли клиент уже
        //$customer = $this->customerRepository->findByPhoneNum($phoneNum);


        // если нет - создать, и закинуть в датабазу
        if ($customer == null) {
            $customer = Customer::create([
                'firstName' => $name,
                'phoneNumber' => $phone,
                'orderCount' => 1,
                'personalDiscount' => 0,
            ]);
        } else {
            $customer->updateOrderCount();
            $customer->save();
        }

        $order = Order::create(
            [
                'orderStatus' => 1,
                'class' => $class,
                'price' => Order::calculatePrice($customer->getPersonalDiscount(), $class),
                'pointA' => $from,
                'pointB' => $to,
                'reviewGiven' => false,
                'customerId' => $customer->id,
            ],
        );
        session(['phoneNum' => $phone, 'firstName' => $name]);
        return redirect('/order');
    }

}
