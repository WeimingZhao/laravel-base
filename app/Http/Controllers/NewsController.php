<?php

namespace App\Http\Controllers;

use App\Services\Foundation\Log\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index');
    }

    public function detail()
    {
        return view('news.detail');
   
    }

    public function create()
    {

        return view('news.create');

    }

    public function test(Request $request)
    {
     //   $form = $request->input();
     //   dd($form);
        dd($request->all());
    }
}
