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
    public function index()
    {
        $phone = session('phoneNum');
        $customer = Customer::where('phoneNumber', $phone)->first();
        $orders = Order::where('customerId', $customer->id)
            ->whereIn('orderStatus',
                [
                    Order::STATE_NEW,
                    Order::STATE_ACCEPTED,
                    Order::STATE_IN_PROGRESS,
                    Order::STATE_COMPLETE,
                ])
            ->where('reviewGiven', false)
            ->get();
        foreach ($orders as $order) {
            if ($order->taxiDriverId != null) {
                $order['TaxiDriver'] = TaxiDriver::where('id', $order->taxiDriverId)->first();
                /*$driver = TaxiDriver::where('id', $order->taxiDriverId)->first();
                $taxiDrivers[] = $driver;*/
                if ($order['TaxiDriver'] != null) {
                    $order['Car'] = Car::where('id', $order['TaxiDriver']->carDriving)->first();
                }
            }
        }

        return view('orders.index')
            ->with('customer', $customer)
            ->with('orders', $orders);
    }

    public function submit(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $phoneNumber = $request->input('phoneNumber');
        $class = $request->input('carClass');
        $name = $request->input('name');
        $customer = Customer::where('phoneNumber', $phoneNumber)->first();
        //проверить был ли клиент уже
        //$customer = $this->customerRepository->findByPhoneNum($phoneNum);


        // если нет - создать, и закинуть в датабазу
        if ($customer == null)
        {
            $customer = Customer::create
            ([
                'firstName' => $name,
                'phoneNumber' => $phoneNumber,
                'orderCount' => 1,
                'personalDiscount' => 0,
                'orderDeclinedCount' => 0,
            ]);
        }
        else
        {
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
        session(['phoneNum' => $phoneNumber, 'firstName' => $name]);
        return redirect('/order');
    }

    public function update(Request $request)
    {
        //find order
        $order = Order::findOrFail($request->input('orderId'));
        //find taxiDriver
        $taxiDriver = TaxiDriver::find($request->input('taxiDriverId'));
        if ($taxiDriver == null) {
            $taxiDriver = TaxiDriver::find($order->taxiDriverId);
        }

        if ($request->input('action') == 'Take') {
            $order->accepted($taxiDriver->id);
            $order->save();
        } elseif ($request->input('action') == 'Decline') {
            if ($request->input('taxiDriverId') == null) {
                $order->failed();
                $customer = Customer::find($order->customerId);
                $customer->declinedOrder();
                $customer->save();
            } else {
                $order->fill(['orderStatus' => Order::STATE_NEW, 'taxiDriverId' => null]);
            }
            $order->save();
        } elseif ($request->input('action') == 'Leave Review') {
            $review = $request->input('rating');
            //if user hasnt selected value in view, default is set, which is 5;
            if ($review == null) {
                $review = 5;
            }
            $order->fill(['reviewGiven' => true]);
            $taxiDriver->reviewIsGiven();
            $taxiDriver->addReviewToHeap($review);
            $taxiDriver->reevaluateRating();
            $order->save();
            $taxiDriver->save();
        } elseif ($request->input('action') == 'Start') {
            $order->inProgress();
            $order->save();
        } elseif ($request->input('action') == 'Finish') {
            $order->complete();
            $order->save();
        }
        return redirect()->back();
    }

}
