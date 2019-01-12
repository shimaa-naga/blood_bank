<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 11/01/2019
 * Time: 09:38 ã
 */

namespace App\Http\Controllers\Admin;


use App\Client;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{


    public function index(){

        $user = User::all();
        return view('admin.clients.index',compact('user'));
    }

    public function create(){

        return view('admin.clients.add');
    }


    public function store(Request $request )
    {
        $rules =  [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        return redirect('/adminpanel/users')->withFlashMessage('added user successfully');
    }


    public function edit($id){

        $user= User::find($id);
        //dd($user);
        return view('admin.clients.edit', compact('user'));
    }

    public function update(Request $request , $id ){

        $user = User::find($id);
      // dd($user);


          $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:6']
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //$user->password = Hash::make($request->password);
        //optional($user)->password = Hash::make($request->password);;

        $user->save();

        return redirect('/adminpanel/users')->withFlashMessage(' user updated successfully');

    }

    public function updatePassword(Request $request){

        $user = User::find($request->user_id);
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return Redirect::back()->withFlashMessage('updated password successfully');


        //dd($user);
        //return Redirect::back();
    }

    public function delete($id)
    {
        if ($id != 1) {
            $user = User::find($id)->delete();
            return redirect('/adminpanel/users')->withFlashMessage('deleted user successfully');
        }
    }

}