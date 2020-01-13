<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\PlanMail;
use App\Order;
use App\Plan;
use App\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ToursController extends Controller
{
    public function show($id)
    {
        $tour = Tour::findorfail($id);
        return view('pages.tour.single', compact('tour'));
    }

    public function order_tour(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'quantity' => 'required|numeric',
            'tour' => 'required|numeric',
            'message' => 'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = new Order();
        $order->name = $request->name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->start = Carbon::createFromFormat('Y-m-d', $request->date_start)->format('d-m-Y');
        $order->end = Carbon::createFromFormat('Y-m-d', $request->date_end)->format('d-m-Y');
        $order->number = $request->quantity;
        $order->tour = $request->tour;
        $order->message = $request->message;
        $order->save();

        Mail::to('rafvardanyan99@gmail.com')->send(new OrderMail($order));

        return redirect()->back()->with('order_success', 'Thank you! We will connect with you as soon as possible! ');
    }

    public function plan_package(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'quantity' => 'required|numeric',
            'message' => 'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plan = new Plan();
        $plan->name = $request->name;
        $plan->last_name = $request->last_name;
        $plan->email = $request->email;
        $plan->phone = $request->phone;
        $plan->start = Carbon::createFromFormat('Y-m-d', $request->date_start)->format('d-m-Y');
        $plan->end = Carbon::createFromFormat('Y-m-d', $request->date_end)->format('d-m-Y');
        $plan->number = $request->quantity;
        if ($plan->accent)
            $plan->accent = json_encode($request->accent);
        else
            $plan->accent = null;
        $plan->message = $request->message;
        $plan->save();

        Mail::to('rafvardanyan99@gmail.com')->send(new PlanMail($plan));

        return redirect()->back()->with('plan_success', 'Thank you! We will connect with you as soon as possible! ');
    }
}
