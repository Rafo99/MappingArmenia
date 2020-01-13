<?php

namespace App\Http\Controllers\Admin;

use App\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ToursController extends Controller
{
    public function getTours()
    {
        $tours = Tour::where('parent_id', null)->get();
        return view('users.admin.tours.all', compact('tours'));
    }

    public function addTour()
    {
        $tours = Tour::where('parent_id', null)->get();
        return view('users.admin.tours.add', compact('tours'));
    }

    public function editTour($id)
    {
        $tour = Tour::findorfail($id);
        $tours = Tour::where('parent_id', null)->get();
        return view('users.admin.tours.edit', compact('tour', 'tours'));
    }

    public function saveTour(Request $request)
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

        $tour = new Tour();
        if ($request->parent_id)
            $tour->parent_id = $request->parent_id;
        $tour->translateOrNew('hy')->title = $request->title_hy;
        $tour->translateOrNew('en')->title = $request->title_en;
        $tour->translateOrNew('ru')->title = $request->title_ru;
        $tour->translateOrNew('hy')->description = $request->desc_hy;
        $tour->translateOrNew('ru')->description = $request->desc_ru;
        $tour->translateOrNew('en')->description = $request->desc_en;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/tours/'), $name);
            $tour->picture = $name;
        }
        $tour->save();

        return redirect()->route('admin.tours.show')->with('message', 'Tour was successfully added');
    }

    public function updateTour($id, Request $request)
    {
        $tour = Tour::findorfail($id);
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

        if ($request->parent_id)
            $tour->parent_id = $request->parent_id;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/tours/'), $name);
            if ($tour->picture !== 'default.jpg')
                File::delete(public_path('img/tours/'.$tour->picture));
            $tour->picture = $name;
        }

        $tour->translateOrNew('hy')->title = $request->title_hy;
        $tour->translateOrNew('en')->title = $request->title_en;
        $tour->translateOrNew('ru')->title = $request->title_ru;
        $tour->translateOrNew('hy')->description = $request->desc_hy;
        $tour->translateOrNew('ru')->description = $request->desc_ru;
        $tour->translateOrNew('en')->description = $request->desc_en;
        $tour->save();

        return redirect()->route('admin.tours.show')->with('message', 'Tour was successfully updated');
    }

    public function deleteTour($id)
    {
        $tour = Tour::findorfail($id);
        if ($tour->picture)
            File::delete(public_path('img/tours/'.$tour->picture));

        $tour->delete();

        return redirect()->route('admin.tours.show')->with('message', 'Tour was successfully deleted!');
    }
}
