<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function index() {
        $res = Employees::all();
        return json_encode($res);
    }

    public function getEmployee(Request $request) {
        $res = Employees::find($request->id);
        return json_encode($res);
    }

    public function updateEmployee($id, Request $request) {
        $res = Employees::find($id)->update($request->input());
        // return $res;
        if($res){
            return json_encode([ 'succeess' => true]);
        }
        return json_encode([ 'error' => false]);
    }

    public function deleteEmployee($id) {
        $res = Employees::find($id);
        if($res)
            $res = $res->delete();
        else 
            return json_encode([ 'error' => false]);
        return $res;
    }
}

