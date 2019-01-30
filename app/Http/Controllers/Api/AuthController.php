<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 07/01/2019
 * Time: 07:11 ã
 */

namespace App\Http\Controllers\Api;



use App\Blood_type;
use App\Client;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//Illuminate\Database\Eloquent\Relations\BelongsTo


class AuthController extends Controller
{

    public function register(Request $request)
    {
        //return $request->all();
        $rules = [
            'name'               => 'required|string|max:255|min:3',
            'email'              => 'required|email|unique:clients|string|max:255',
            'password'           => 'required|string|min:6|confirmed',
            'dob'                => 'required|date|date_format:Y-m-d|before:2001-01-01',
            'phone'              => 'required|min:11|numeric|unique:clients',
            'donation_last_date' => 'required|date|date_format:Y-m-d',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
            'blood_type_id'      => 'required|exists:blood_types,id',
            'city_id'            => 'required|exists:cities,id'
        ];

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails())
        {
            return responseJson(0 , $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);

        $client = Client::create($request->all());
        $client->api_token = str_random(100);
        $client->save();

        $client->governorates()->attach($client->id);
        $bloodType = Blood_type::where('name', $request->blood_type)->first();
        $client->blood_types()->attach($bloodType->id);

        return responseJson(1 ,'client added successfully', [
            'api_token' => $client->api_token ,
            'client'  => $client
        ]);

    }


    public function login(Request $request )
    {
        $rules = [
            'phone'              => 'required|min:11|numeric',
            'password'           => 'required|string|min:6'
        ];

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails())
        {
            return responseJson(0 , $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('phone' , $request->phone)->first();
        if($client && $client->is_active == 1)
        {
            if(Hash::check($request->password , $client->password))
            {
                return responseJson(1 , 'Signed In' , [
                    'api_token' => $client->api_token,
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


    public function updateProfile(Request $request){

        $validation = validator()->make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($request->user()->id)],
            'phone' => ['required', 'numeric', 'min:11', 'max:255', Rule::unique('clients')->ignore($request->user()->id)],
            'password' => ['confirmed', 'string', 'min:6']
        ]);
        if($validation->fails()){
            $errorData = $validation->errors();
            return responseJson(0, $errorData->first(), $errorData);
        }
        $loginUser = $request->user();

        $loginUser->update($request->all());

        if($loginUser->has('password')){
            $loginUser->password = bcrypt($request->password);
        }
        $loginUser->save();

        if($request->has('governorate_id'))
        {
            $loginUser->cities()->detach($request->city_id);
            $loginUser->cities()->attach($request->city_id);
        }

        if($request->has('blood_type'))
        {
            $bloodType = Blood_type::where('name', $request->blood_type)->first();
            $loginUser->bloodTypes()->detach($bloodType->id);
            $loginUser->bloodTypes()->attach($bloodType->id);
        }
        }



    public function getprofile($id)
    {
        $client_details = Client::find($id);
        if($client_details){
            return responseJson(1 , 'client details' , $client_details);
        }
        return responseJson(0 , 'Not Found This Client');
    }


    public function reset(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'phone'  => 'required|min:11|numeric'
        ]);
        if($validation->fails())
        {
            $dataError = $validation->errors();
            return responseJson(0, $dataError->first(), $dataError);
        }

        $user = Client::where('phone', $request->phone)->first();
        if($user)
        {
            $code = rand(1111,9999);
            $updateUser = $user->update(['pin_code' => $code]);
            if($updateUser)
            {
                //send email
                Mail::to($user->email)
                    ->bcc("shimaa_naga@yahoo.com")
                    ->send(new ResetPassword($code));


                return responseJson(1,'Please check your phone now', ['pin_code_for_test' => $code]);
            }else{
                return responseJson(0, 'An error occurred, please try again');
            }


        }else{
            return responseJson(0, 'No account associated with this number');
        }
    }

    public function password(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'pin_code' => 'required',
            'password' => 'required|confirmed'
        ]);
        if($validation->fails())
        {
            $dateError = $validation->errors();
            return responseJson(0,$dateError->first(), $dateError);
        }

        $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();
        if($user)
        {
          $user->password = bcrypt($request->password);
          $user->pin_code = null;
            if($user->save())
            {
                return responseJson(1, 'Password changed successfully');
            }
            else{
                return responseJson(0, 'An error occurred, please try again');
            }
        }
        else{
            return responseJson(0, 'This code is invalid');
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