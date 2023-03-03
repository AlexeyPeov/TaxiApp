<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index (){
        return view('orders.index');
    }

    public function submit(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $phone = $request->input('phone');
        $class = $request->input('carClass');

        $customer = Customer::where('phoneNumber', $phone)->first();
        //проверить был ли клиент уже
        //$customer = $this->customerRepository->findByPhoneNum($phoneNum);


        // если нет - создать, и закинуть в датабазу
        if ($customer == null) {
            $customer = Customer::create([
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
        return view('orders.submit');
    }

}
