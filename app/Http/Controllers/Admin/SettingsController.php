<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function showSliders()
    {
        $images = Image::where('slider', 1)->orderBy('id', 'asc')->get();
        return view('users.admin.settings.slider.index', compact('images'));
    }

    public function updateSlider(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image_id' => 'required|numeric',
        ]);
        if ($validator->fails())
            return redirect()->back()->withInput($request->all())->withErrors($validator)->with('message', 'Something went wrong');


        $image = Image::findorfail($request->image_id);
        if ($request->has('picture'))
        {
            $picture = $request->file('picture');
            $name = time(). '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('img/slider/'), $name);
            File::delete(public_path('img/slider/'.$image->name));
            $image->name = $name;
            $image->save();
        }


        $texts = Slider::where('image_id', $image->id)->get();
        foreach ($texts as $text)
        {
            $text->delete();
        }
        for ($i = 0; $i < count($request->text); $i++)
        {
            if ($request->text[$i] != null)
            {
                $slider[$i] = new Slider();
                $slider[$i]->image_id = $request->image_id;
                $slider[$i]->text = $request->text[$i];
                $slider[$i]->save();
            } else {
                continue;
            }

        }

        return redirect(route('admin.slider'))->with('message', 'Slider - '.$request->image_id.' was successfully changed!');
    }


    public function addSlider()
    {
        return view('users.admin.settings.slider.add');
    }

    public function saveSlider(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'picture' => 'required'
        ]);
        if ($validator->fails())
            return redirect()->back()->withInput($request->all())->withErrors($validator)->with('message', 'Image is required');

        $picture = $request->file('picture');
        $name = time(). '.' . $picture->getClientOriginalExtension();
        $picture->move(public_path('img/slider/'), $name);

        $image = new Image();
        $image->slider = 1;
        $image->name = $name;
        $image->save();

        for ($i = 0; $i < count($request->text); $i++)
        {
            if ($request->text[$i] != null)
            {
                $slider[$i] = new Slider();
                $slider[$i]->image_id = $image->id;
                $slider[$i]->text = $request->text[$i];
                $slider[$i]->save();
            } else {
                continue;
            }
        }

        return redirect(route('admin.slider'))->with('message', 'Slider was successfully Added!');
    }

    public function deleteSlider(Request $request)
    {
        $image = Image::findorfail($request->id);
        File::delete(public_path('img/slider/'.$image->name));
        $image->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function showContact()
    {
        $contact_img = Image::where('contacts', 1)->first();
        return view('users.admin.settings.contacts.index', compact('contact_img'));
    }

    public function saveContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'picture' => 'required',
            'image_id' => 'required|numeric'
        ]);
        if ($validator->fails())
            return redirect()->back()->withInput($request->all())->withErrors($validator)->with('message', 'Image is required');

        $contact_img = Image::findorfail($request->image_id);
        $picture = $request->file('picture');
        $name = time(). '.' . $picture->getClientOriginalExtension();
        $picture->move(public_path('img/contacts/'), $name);
        File::delete(public_path('img/contacts/'.$contact_img->name));

        $contact_img->name = $name;
        $contact_img->save();

        return redirect(route('admin.contact'))->with('message', 'Image was successfully changed!');
    }
}
