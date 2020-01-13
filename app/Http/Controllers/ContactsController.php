<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message = new Message();
        $message->name = $request->name;
        $message->last_name = $request->last_name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->save();

        Mail::to('rafvardanyan99@gmail.com')->send(new ContactFormMail($message));

        return redirect()->back()->with('success', 'Message was successfuly sent!');
    }
}
