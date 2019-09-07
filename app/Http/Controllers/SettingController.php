<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings=Setting::first();
        return view('settings.index',compact('settings'));
    }
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'blog_name'=>'required',
                'phone'=>'required',
                'blog_email'=>'required',
                'address'=>'required',
            ]);
        $settings=Setting::first();
        $settings->blog_name=$request->blog_name;
        $settings->phone=$request->phone;
        $settings->blog_email=$request->blog_email;
        $settings->address=$request->address;
        $settings->save();
        flash()->success("Edited Successfuly");
        return redirect()->back();
    }
}
