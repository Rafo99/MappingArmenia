<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Blog;

class BlogsController extends Controller
{
    public function getBlogs()
    {
        $blogs = Blog::all();
        return view('users.admin.blogs.all', compact('blogs'));
    }

    public function addBlog()
    {
        return view('users.admin.blogs.add');
    }

    public function editBlog($id)
    {
        $blog = Blog::findorfail($id);
        return view('users.admin.blogs.edit', compact('blog'));
    }

    public function saveBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_hy' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_hy' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('message', 'Something went wrong');

        $package = new Blog();
        $package->translateOrNew('hy')->title = $request->title_hy;
        $package->translateOrNew('en')->title = $request->title_en;
        $package->translateOrNew('ru')->title = $request->title_ru;
        $package->translateOrNew('hy')->text = $request->desc_hy;
        $package->translateOrNew('ru')->text = $request->desc_ru;
        $package->translateOrNew('en')->text = $request->desc_en;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/blogs/'), $name);
            $package->picture = $name;
        }
        $package->save();

        return redirect()->route('admin.blogs.show')->with('message', 'Blog was successfully added');
    }

    public function updateBlog($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_hy' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_hy' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all());

        $package = Blog::findorfail($id);
        $package->translateOrNew('hy')->title = $request->title_hy;
        $package->translateOrNew('en')->title = $request->title_en;
        $package->translateOrNew('ru')->title = $request->title_ru;
        $package->translateOrNew('hy')->text = $request->desc_hy;
        $package->translateOrNew('ru')->text = $request->desc_ru;
        $package->translateOrNew('en')->text = $request->desc_en;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/blogs/'), $name);
            if ($package->picture !== 'default.jpg')
                File::delete(public_path('img/blogs/'.$package->picture));
            $package->picture = $name;
        }

        $package->save();

        return redirect()->route('admin.blogs.show')->with('message', 'Blog was successfully updated');
    }

    public function deleteBlog($id)
    {
        $package = Blog::findorfail($id);
        if ($package->picture)
            File::delete(public_path('img/blogs/'.$package->picture));

        $package->delete();

        return redirect()->route('admin.blogs.show')->with('message', 'Blog was successfully deleted!');
    }
}
