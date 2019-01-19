<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 06/01/2019
 * Time: 11:05 ã
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\City;
use App\Governorate;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function posts()
    {
        //$posts = Post::all();
        $posts = Post::with('category')->paginate(10);
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

    public function posts_with_filter($keyword)
    {
        $posts_filter = DB::table('posts')
            ->join('categories' ,'posts.category_id', '=', 'categories.id')
            ->select('posts.title', 'posts.image', 'posts.content', 'posts.created_at', 'posts.updated_at', 'categories.name as category name')
            ->where('posts.title', 'like', "%$keyword%")
            ->orWhere('posts.content', 'like', "%$keyword%")
            ->get();
        //return $posts_filter;
        if($posts_filter){
            return responseJson(1 , 'Posts Search For It' , $posts_filter);
        }
        return responseJson(0 , 'Not FOund Any Post Like It');
    }





    public function siteSetting(){
        $sitesetting = Setting::all();
        //dd($sitesetting);
        return responseJson(1 , 'success' , $sitesetting);
    }


}