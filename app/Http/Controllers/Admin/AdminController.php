<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 11/01/2019
 * Time: 02:15 ã
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');

    }




}