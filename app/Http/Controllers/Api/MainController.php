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
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function governorates()
    {
        $governorates = Governorate::all();
        //return responseJson(1 , 'success' , $governorates);
        return $governorates;
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
        $posts = Post::with('category')->paginate(10);
        //$posts = Post::all();
        return responseJson(1 , 'success' , $posts);
    }
}