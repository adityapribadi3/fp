<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddress;

class UserAddressController extends Controller
{
  public function getUserAddress()
  {
  return UserAddress::all();
}

public function insertUserAddress(Request $request){
  try{
  $data = new UserAddress();
  $data['name'] = $request->input('name');
  $data['address'] = $request->input('address');
  $data['user_id'] = $request->input('user_id');
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

public function deleteUserAddress(Request $request){
try{
  $task = UserAddress::where('id','=',$request->input('id'))->delete();

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

public function updateUserAddress(Request $request){
try{
  $task = UserAddress::where('id','=',$request->input('id'))
          ->update([
          'name' => $request->input('name'),
          'address' => $request->input('address'),
          'user_id' => $request->input('user_id')
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
