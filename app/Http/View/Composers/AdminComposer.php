<?php

namespace App\Http\View\Composers;

use App\Message;
use App\Order;
use App\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminComposer
{

    public function __construct()
    {
        $this->user = Auth::user();
        $this->count_messages = count(Message::where('read', 0)->get());
        $this->count_orders = count(Order::where('read', 0)->get());
        $this->count_plans = count(Plan::where('read', 0)->get());
        $this->all_messages = $this->count_messages + $this->count_orders + $this->count_plans;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
        $view->with('count_messages', $this->count_messages);
        $view->with('count_orders', $this->count_orders);
        $view->with('count_plans', $this->count_plans);
        $view->with('all_messages', $this->all_messages);
    }
}
