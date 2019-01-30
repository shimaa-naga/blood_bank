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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{


    public function index(){

        $user = User::all();
        return view('admin.users.index',compact('user'));
    }

    public function create(){

        return view('admin.users.add');
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
        return view('admin.users.edit', compact('user'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function update(Request $request , $id ){

        //return [$request->all()];
        $user = User::find($id);

          $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['sometimes','confirmed']
        ];

        if(!is_null($request->password)){
            $rules['password'] = ['confirmed', 'min:6'];
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

//        Auth::user();
//        auth()->user();
        //$user->password = Hash::make($request->password);
        //optional($user)->password = Hash::make($request->password);;

        $user->save();

        return redirect('/adminpanel/users')->withFlashMessage(' user updated successfully');

    }



    public function delete($id)
    {
        if ($id != 1) {
            $user = User::find($id)->delete();
            return redirect('/adminpanel/users')->withFlashMessage('deleted user successfully');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}