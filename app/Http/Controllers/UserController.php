<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    function login (Request $request) {
        $res = User::where('nickname', $request->nickname)->first();
        if(!empty($res)){
            $time = date('Y:m:d H:i:s');
            $id = $res->login;
            if($res->parol === $request->parol){
                $newres = DB::table('logins')->insert([
                    'id' => NULL,
                    'login' => $id,
                    'date_in' => $time,
                    'date_out' => NULL,
                    'status' => 'ok'
                ]);
                return json_encode([ 'success' => true, 'token' => $id]);
            } else {
                $newres = DB::table('logins')->insert([
                    'id' => NULL,
                    'login' => $id,
                    'date_in' => $time,
                    'date_out' => NULL,
                    'status' => 'fail'
                ]);
                return json_encode(['error' => 'invalid password']);
            }
        } else{
            return json_encode(['error' => 'invalid username']);
        }
    }
}
