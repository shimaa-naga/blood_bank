<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 30/01/2019
 * Time: 08:48 ã
 */

namespace App\Http\Controllers\Admin;


use App\City;
use App\Order;

class OrdersController
{

    public function index()
    {
      $orders = Order::with(['city'])->get();
     // $city = City::where($orders->city_id, '=', 'id');
        //return $city->name;
        return view('admin.orders.index', compact('orders','city'));
    }


    public function order_details($id)
    {

        $order = Order::find($id);

         return view ('admin.orders.order_details', compact('order'));
    }

    public function delete($id)
    {
        $order = Order::find($id)->delete();
          return redirect('/adminpanel/orders')->withFlashMessage('Order Deleted Successfully');

    }

}