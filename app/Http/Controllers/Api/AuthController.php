<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 07/01/2019
 * Time: 07:11 ã
 */

namespace App\Http\Controllers\Api;


use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $rules = [
            'name'               => 'required|string|max:255|min:3',
            'email'              => 'required|email|unique:clients|string|max:255',
            'password'           => 'required|string|min:6|confirmed',
            'dob'                => 'required|date|date_format:Y-m-d|before:2001-01-01',
            'phone'              => 'required|min:11|integer|unique:clients',
            'donation_last_date' => 'required|date|date_format:Y-m-d',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
            'blood_type_id'      => 'required',
            'city_id'            => 'required'
        ];

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails())
        {
            return responseJson(0 , $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->remember_token = str_random(100);
        $client->save();
        return responseJson(1 ,'client added successfully', [
            'remember_token' => $client->remember_token ,
            'client'  => $client
        ]);

    }


    public function login(Request $request)
    {
        $rules = [
            'phone'              => 'required|min:11|integer|unique:clients',
            'password'           => 'required|string|min:6'
        ];

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails())
        {
            return responseJson(0 , $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('phone' , $request->phone)->first();
        if($client)
        {
            if(Hash::check($request->password , $client->password))
            {
                return responseJson(1 , 'Signed In' , [
                    'remember_token' => $client->remember_token,
                    'client' => $client ]);
            }
            else
            {
                return responseJson(0 , 'The login data is incorrect');
            }
        }
        else
        {
            return responseJson(0 , 'The login data is incorrect');
        }


    }

    /*
        public function login(Request $request)
        {
            if(Auth::attempt(['phone'=> $request->get('phone') , 'password'=>$request->get('password')]))
            {
                return redirect('/');
            }
        }
    */

}