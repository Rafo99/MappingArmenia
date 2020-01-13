<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Image;

class MainController extends Controller
{
    public function index ()
    {
        $slider = Image::where('slider', 1)->get();
        $contact_img = Image::where('contacts', 1)->first();
        return view('pages.home.index', compact('slider', 'contact_img'));
    }

    public function about()
    {
        return view('pages.home.index');
    }

    public function contacts()
    {
        return view('pages.contacts.index');
    }

    public function our_packages()
    {
        return view('pages.packages.default.index');
    }

    public function plan_package()
    {
        return view('pages.packages.plan-yours.index');
    }

    public function order_tour()
    {
        return view('pages.order.index');
    }

    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(8);
        return view('pages.blog.index', compact('blogs'));
    }
}
