<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginHistoryController extends Controller
{
    //
    function writeHistory (Request $request) {
        $res = DB::table('logins')->where('login', $request->login)->exists();
        if($res){
            $res = DB::table('logins')->where('login', $request->login)->get();
            return json_encode($res);
        } else{
            return json_encode([ 'error' => 'No records']);
        }
    }

    function getStats (Request $request) {
        $res = DB::table('logins')->where('login', $request->login)->exists();
        if($res){
            $login = $request->login;
            $fails = DB::select("select count(status) as count from logins where status = 'fail' and login = $login");
            $successes = DB::select("select count(status) as count from logins where status = 'ok' and login = $login");
            $res = [
                [
                    "name" => "Successfull",
                    "count" => $successes[0]->count
                ],
                [
                    "name" => "Failed",
                    "count" => $fails[0]->count
                ]                
            ];
            return json_encode($res);
        } else{
            return json_encode([ 'error' => 'No records']);
        }
    }
}
