<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Order;
use App\Plan;
use App\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function getMessages()
    {
        $messages = Message::orderBy('read')->orderBy('id', 'desc')->paginate(10);
        return view('users.admin.messages.messages.index', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = Message::findorfail($id);
        if ($message->read == 0)
        {
            $message->read = 1;
            $message->save();
        }
        return view('users.admin.messages.messages.single', compact('message'));
    }



    public function getOrders()
    {
        $orders = Order::orderBy('read')->orderBy('id', 'desc')->paginate(10);
        return view('users.admin.messages.orders.index', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::findorfail($id);
        if ($order->read == 0)
        {
            $order->read = 1;
            $order->save();
        }
        return view('users.admin.messages.orders.single', compact('order'));
    }



    public function getPlans()
    {
        $plans = Plan::orderBy('read')->orderBy('id', 'desc')->paginate(10);
        return view('users.admin.messages.plans.index', compact('plans'));
    }

    public function showPlan($id)
    {
        $plan = Plan::findorfail($id);
        if ($plan->read == 0)
        {
            $plan->read = 1;
            $plan->save();
        }
        if ($plan->accent)
        {
            $decoded = json_decode($plan->accent);
            $tours = Tour::whereIn('id', $decoded)->get();
            $accents = [];
            foreach ($tours as $tour)
            {
                array_push($accents, $tour->getTranslation('en')->title);
            }
            $plan->accent = $accents;
        }

        return view('users.admin.messages.plans.single', compact('plan'));
    }
}
