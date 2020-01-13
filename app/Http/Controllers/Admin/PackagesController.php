<?php

namespace App\Http\Controllers\Admin;

use App\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Package;

class PackagesController extends Controller
{
    public function getPackages()
    {
        $packages = Package::all();
        return view('users.admin.packages.all', compact('packages'));
    }

    public function addPackage()
    {
        $tours = Tour::where('parent_id', null)->get();
        return view('users.admin.packages.add', compact('tours'));
    }

    public function editPackage($id)
    {
        $package = Package::findorfail($id);
        $tours = Tour::where('parent_id', null)->get();
        return view('users.admin.packages.edit', compact('package', 'tours'));
    }

    public function savePackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_hy' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_hy' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
            'parent_id' => 'required|numeric'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('message', 'Something went wrong');

        $package = new Package();
        $package->tour_id = $request->parent_id;
        $package->translateOrNew('hy')->title = $request->title_hy;
        $package->translateOrNew('en')->title = $request->title_en;
        $package->translateOrNew('ru')->title = $request->title_ru;
        $package->translateOrNew('hy')->description = $request->desc_hy;
        $package->translateOrNew('ru')->description = $request->desc_ru;
        $package->translateOrNew('en')->description = $request->desc_en;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/packages/'), $name);
            $package->picture = $name;
        }
        $package->save();

        return redirect()->route('admin.packages.show')->with('message', 'Package was successfully added');
    }

    public function updatePackage($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_hy' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'desc_hy' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
            'parent_id' => 'required|numeric'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput($request->all());

        $package = Package::findorfail($id);
        $package->tour_id = $request->parent_id;
        $package->translateOrNew('hy')->title = $request->title_hy;
        $package->translateOrNew('en')->title = $request->title_en;
        $package->translateOrNew('ru')->title = $request->title_ru;
        $package->translateOrNew('hy')->description = $request->desc_hy;
        $package->translateOrNew('ru')->description = $request->desc_ru;
        $package->translateOrNew('en')->description = $request->desc_en;

        if ($request->hasFile('picture'))
        {
            $pic = $request->file('picture');
            $name = time(). '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('img/packages/'), $name);
            if ($package->picture !== 'default.jpg')
                File::delete(public_path('img/packages/'.$package->picture));
            $package->picture = $name;
        }

        $package->save();

        return redirect()->route('admin.packages.show')->with('message', 'Package was successfully updated');
    }

    public function deletePackage($id)
    {
        $package = Package::findorfail($id);
        if ($package->picture)
            File::delete(public_path('img/packages/'.$package->picture));

        $package->delete();

        return redirect()->route('admin.packages.show')->with('message', 'Package was successfully deleted!');
    }
}
