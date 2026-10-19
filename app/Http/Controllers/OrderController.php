<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
  {
    $explode_id=Order::orderby('id','desc')->value('cart_items');
      $orders = json_decode($explode_id, true);
      $ords=Order::orderby('id','desc')->get();
     // dd($orders);
    return view('admin.order.order',compact('orders','ords'));
  }


public function confirm($id)
{
    $order=Order::where('id',$id)->first();
    $order->status=1;
    $order->save();
    
    return back();
}
public function destroy(Product $product, $id)
{
   
//  unlink(public_path('./uploads/'.$product->thum_img)); 

//   $moreimg=Moreimg::where('pid',$product->id)->get();
//   foreach ($moreimg as $moreimg) {
//     unlink(public_path('./uploads/moreimg/'.$moreimg->moreimg));
//     $moreimg->delete();
//   }

$product->delete();

return back()->with('success','This info deleted successfully');

}
}

