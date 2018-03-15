<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
  public function getOrder()
  {
  return Order::all();
}

public function insertOrder(Request $request){
  try{
  $data = new Order();
  $data['user_id'] = $request->input('user_id');
  $data['order_status'] = $request->input('order_status');
  $data['order_date'] = $request->input('order_date');
  $data['total_price'] = $request->input('total_price');
  $data['payment_date'] = $request->input('payment_date');
  $data['payment_amount'] = $request->input('payment_amount');
  $data['max_payment_date'] = $request->input('max_payment_date');
  $data['payment_status'] = $request->input('payment_status');
  $data->save();

  if($data==0){
    return response([
      'msg'=>'fail'
    ],400);
  }else{
    return response([
      'msg'=>'success',

    ],200);
  }
}catch(Exception $error){
   return response([
     'msg'=>'fail'
   ],400);
 }
 }

 public function deleteOrder(Request $request){
 try{
  $task =  Order::where('id','=',$request->input('id'))->delete();

   if($task==0){
     return response([
       'msg'=>'fail'
     ],400);
   }else{
     return response([
       'msg'=>'success'
     ],200);
   }
 }catch(Exception $error){
   return response([
     'msg'=>'fail'
   ],400);
 }
 }

 public function updateOrder(Request $request){
 try{
  $task =  Order::where('id','=',$request->input('id'))
           ->update([

           'user_id' => $request->input('user_id'),
           'order_status' => $request->input('order_status'),
           'order_date' => $request->input('order_date'),
           'total_price' => $request->input('total_price'),
           'payment_date' => $request->input('payment_date'),
           'payment_amount' => $request->input('payment_amount'),
           'max_payment_date' => $request->input('max_payment_date'),
           'payment_status' => $request->input('payment_status')

                   ]);

           if($task==0){
             return response([
               'msg'=>'fail'
             ],400);
           }else{
             return response([
               'msg'=>'success'
             ],200);
           }
         }catch(Exception $error){
           return response([
             'msg'=>'fail'
           ],400);
         }
 }
}
