<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 11/01/2019
 * Time: 11:27 ã
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{


    public function index(){
        $sitesetting = Setting::all();
        return view('admin.sitesetting.index', compact('sitesetting'));
    }


    public function updateSettings(Request $request, $id = 1)
    {
        $settings = Setting::find($id);
        $rules = [
            'site_name'          => 'required|string|max:255|min:3',
            'phone'              => 'required|min:11|numeric',
            'email'              => 'required|email|max:255',
            'android_app_url'    => 'required|url',
            'ios_app_url'        => 'required|url',
            'facebook_url'       => 'required|url',
            'whatsapp_url'       => 'required|url',
            'instgram_url'       => 'required|url',
            'youtube_url'        => 'required|url',
            'twitter_url'        => 'required|url',
            'about'              => 'required|string|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $settings->site_name       = $request->site_name;
        $settings->phone           = $request->phone;
        $settings->email           = $request->email;
        $settings->android_app_url = $request->android_app_url;
        $settings->ios_app_url     = $request->ios_app_url;
        $settings->facebook_url    = $request->facebook_url;
        $settings->whatsapp_url    = $request->whatsapp_url;
        $settings->instgram_url    = $request->instgram_url;
        $settings->youtube_url     = $request->youtube_url;
        $settings->twitter_url     = $request->twitter_url;
        $settings->about           = $request->about;
        $settings->save();
        //dd($settings) ;
        return redirect('/adminpanel/sitesetting')->withFlashMessage('Updated Site Settings Successfully');
    }
}