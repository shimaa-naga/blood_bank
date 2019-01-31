<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 06/01/2019
 * Time: 11:05 ã
 */

namespace App\Http\Controllers\Api;

use App\Blood_type;
use App\Category;
use App\Http\Controllers\Controller;
use App\City;
use App\Governorate;
use App\Notification;
use App\Order;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{

    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1 , 'success' , $governorates);
        //return $governorates;
    }

    public function cities(Request $request)
    {
        //$cities = City::where(function($query){})->get();

        $cities = City::where(function($query) use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id' , $request->governorate_id);
            }
        })->get();

        return responseJson(1 , 'success' , $cities);
    }

    public function posts(Request $request)
    {
        $posts = Post::all();
        $posts = Post::where(function($query) use($request){
            if($request->has('category_id'))
            {
                $query->where('category_id',$request->category_id);
            }
            if($request->has('keyword'))
            {
                $query->where(function($query2) use($request){
                    $query2->where('title','like','%'.$request->keyword.'%');
                    $query2->orWhere('content','like','%'.$request->keyword.'%');
                });
            }
        })->with('category')->paginate(10);
        return responseJson(1 , 'success' , $posts);
    }

    public function post_details($id)
    {
       //$post = Post::find($id);
        $post = Post::with(['category' => function ($query) use($id) {
            $query->where('id','=',$id);
        }])->get();
        if($post){
            return responseJson(1 ,'Details Of Post' ,$post);
        }
        return responseJson(0 ,'Not Found');
    }

    public function posts_with_filter(Request $request)
    {
        $posts = Post::where(function($query) use($request){
            $query->where('category_id',$request->category_id);
            $query->where(function($query2) use($request){
                $query2->where('title','like','%'.$request->keyword.'%');
                $query2->orWhere('content','like','%'.$request->keyword.'%');
            });
        })->with('category')->latest()->paginate(10);
        return responseJson(1,'Posts with optional filter' , $posts);


       /* $posts_filter = DB::table('posts')
            ->join('categories' ,'posts.category_id', '=', 'categories.id')
            ->select('posts.title', 'posts.image', 'posts.content', 'posts.created_at', 'posts.updated_at', 'categories.name as category name')
            ->where('posts.title', 'like', "%$keyword%")
            ->orWhere('posts.content', 'like', "%$keyword%")
            ->get();
        //return $posts_filter;
        if($posts_filter){
            return responseJson(1 , 'Posts Search For It' , $posts_filter);
        }
        return responseJson(0 , 'Not FOund Any Post Like It');*/
    }

    public function categories()
    {
        $categories = Category::all();
        return responseJson(1 , 'success' , $categories);
    }

    public function list_orders()
    {
        $orders = Order::with('city')->paginate(15);
        return responseJson(1, 'List Of Orders', $orders);
    }


    public function order_details($id)
    {
        $order_details = Order::with(['city' => function ($query) use($id) {
            $query->where('id', '=', $id);
        }])->get();
        return responseJson(1, 'Order Details', $order_details);
    }

    public function create_order(Request $request)
    {
        $rules = [
            'name'               => 'required|string|max:255|min:3',
            'age'                => 'required|integer',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
            'number_of_bags'     => 'required|integer',
            'hospital_name'      => 'required|string',
            'latitude'           => 'required',
            'longitude'          => 'required',
            'governorate'        => 'required',
            'city_id'            => 'required',
            'phone'              => 'required|min:11|numeric|unique:clients',
            'details'            => 'required|min:10',
        ];

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails())
        {
            return responseJson(0 , $validator->errors()->first(), $validator->errors());
        }
        $order = Order::create($request->all());
        $notification = Notification::create([
            'title' => $request->name,
            'body'  => $request->details,
            'order_id'  => $order->id,
        ]);
        $order->save();
        $notification->save();
        return responseJson(1, 'Ordr Added Successfully', $order , $notification);
    }

    public function listOfNotificatios()
    {
        $notification = Notification::with(['order', 'clients:name'])->paginate(15);
        return responseJson(1, 'List Of Notifications', $notification);
    }

    public function postFavourite(Request $request)
    {
        $rules = ['post_id' => 'required|exists:posts,id'];
        $validator = validator()->make($request->all(), $rules);
        if($validator->fails())
        {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $togglePost = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'Success', $togglePost);
    }

    public function myFavourites(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(20);
        return responseJson(1, 'Loading....', $posts);
    }


    public function bloodtype()
    {
        $bloodtype = Blood_type::with('clients')->get();
        return responseJson(1,'bloodtypes',$bloodtype);
    }



    public function siteSetting(){
        $sitesetting = Setting::all();
        //dd($sitesetting);
        return responseJson(1 , 'Site Setting' , $sitesetting);
    }




}