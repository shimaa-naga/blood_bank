<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 11/01/2019
 * Time: 09:47 ã
 */

namespace App\Http\Controllers\Admin;


use App\BloodType;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{

    public function index(){

        $client = Client::all();
        return view('admin.clients.index',compact('client'));
    }

    public function create(){

        return view('admin.clients.add');
    }

    public function store(Request $request  )
    {
        $rules =  [
            'name'               => 'required|string|max:255|min:3',
            'email'              => 'required|email|unique:clients|string|max:255',
            'password'           => 'required|string|min:6|confirmed',
            'dob'                => 'required|date|date_format:Y-m-d|before:2001-01-01',
            'phone'              => 'required|min:11|numeric|unique:clients',
            'donation_last_date' => 'required|date|date_format:Y-m-d',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
            //'bloodType_id'      => 'required',
            'city_id'            => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $bloodtype = BloodType::where('name', $request->blood_type)->first();
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'donation_last_date' => $request->donation_last_date,
            'blood_type' => $request->blood_type,
            'blood_type_id' => $bloodtype->id,
        ]);
        $client->api_token = str_random(100);
        $client->save();

        return redirect('/adminpanel/clients')->withFlashMessage('added user successfully');
    }

    public function edit($id){

        $client= Client::find($id);
        //dd($user);
        return view('admin.clients.edit', compact('client'));
    }


    public function update(Request $request , $id ){

        $client = Client::find($id);

        $rules =  [
            'name'               => 'required|string|max:255|min:3',
            'email'              => ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($client->id)],
            'phone'              => ['required', 'numeric', 'min:11', 'max:255', Rule::unique('clients')->ignore($client->id)],
            'dob'                => 'required|date|date_format:Y-m-d|before:2001-01-01',
            'donation_last_date' => 'required|date|date_format:Y-m-d',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
            'city_id'            => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $client->name               = $request->input('name');
        $client->email              = $request->input('email');
        $client->dob                = $request->input('dob');
        $client->phone              = $request->input('phone');
        $client->blood_type         = $request->input('blood_type');
        $client->city_id            = $request->input('city_id');
        $client->donation_last_date = $request->input('donation_last_date');

        $client->save();

        return redirect('/adminpanel/clients')->withFlashMessage(' Client updated successfully');

    }


    public function pan($id)
    {
        $client = Client::find($id);
        $client->is_active = 0;
        $client->save();
        //return $client;
        return redirect('/adminpanel/clients')->withFlashMessage('Paned Client Successfully');

    }
}