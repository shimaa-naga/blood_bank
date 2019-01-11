<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 11/01/2019
 * Time: 09:47 ã
 */

namespace App\Http\Controllers\Admin;


use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function index(){

        $user = Client::all();
        return view('admin.clients.index',compact('user'));

    }


}