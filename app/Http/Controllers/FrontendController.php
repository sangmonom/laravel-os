<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;

class FrontendController extends Controller
{
   function home($value=''){
   	$items =Item::orderBy('id','desc')->take(3)->get();
   	//dd($items);
   	return view('frontend.home',compact('items'));
   }
   //ItemController->show
   public function itemdetail($item)
   {
   		$item=Item::find($item);
   		return view('frontend.detail',compact('item'));
   }
   public function cart()
   {
   		return view('frontend.cart');
   }
   public function checkout(Request $request)
   {
      $arr=json_decode($request->data);
      $list=$arr->product_list;
      //dd($arr->product_list);
      $total=0;
      foreach ($list as $row) {
         $subtotal=$row->price*$row->quantity;
         $total+=$subtotal;
      }

      $order=new Order;
      $order->orderdate=date('Y-m-d');
      $order->voucherno=uniqid();
      $order->total=$total;
      $order->note='Note Here';
      $order->status=0;
      $order->user_id=1;

      $order->save();
      //Insert into item_order
      foreach ($list as $row){
         //order=1,rowid=itemid can be many and qty can be many
      $order->items()->attach($row->id,['qty'=>$row->quantity]);
      }
      return 'Your Order Successfully!';
   }

}
