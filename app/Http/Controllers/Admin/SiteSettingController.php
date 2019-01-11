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

class SiteSettingController extends Controller
{


    public function index(){
        $sitesetting = Setting::all();
        return view('admin.sitesetting.index', compact('sitesetting'));
    }
}