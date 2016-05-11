<?php

namespace App\Http\Controllers;

use App\Services\Foundation\Log\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$site_name = "动态列表";
    	echo "<title>".$site_name."</title>";     	
        return view('school.index');
    }

    public function create()
    {
    	$site_name = "发布动态";
    	echo "<title>".$site_name."</title>";     	
        return view('school.create');
    }


}
