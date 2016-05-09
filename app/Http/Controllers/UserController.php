<?php

namespace App\Http\Controllers;

use App\Services\Foundation\Log\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Models;

use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
    	DB::table('users')->insert([
		    ['user_code'=>'101201801002','realname'=>'张1','student_id' => '2018102'],
	   		['user_code'=>'101201801003','realname'=>'张2','student_id' => '2018103'],
		    ['user_code'=>'101201801004','realname'=>'张3','student_id' => '2018104'],
		]);
    }


}
