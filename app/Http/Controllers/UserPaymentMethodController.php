<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPaymentMethod;


class UserPaymentMethodController extends Controller
{
  public function getUserPaymentMethod()
  {
  return UserPaymentMethod::all();
}

public function insertUserPaymentMethod(Request $request){
  try{
  $data = new UserPaymentMethod();
  $data['user_id'] = $request->input('user_id');
  $data['payment_id'] = $request->input('payment_id');
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

public function deleteUserPaymentMethod(Request $request){
try{
  $task = UserAccount::where('id','=',$request->input('id'))->delete();

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

public function updateUserPaymentMethod(Request $request){
try{
  $task = UserPaymentMethod::where('id','=',$request->input('id'))
          ->update([
          'user_id' => $request->input('user_id'),
          'payment_id' => $request->input('payment_id')

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
