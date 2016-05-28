<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\Foundation\NewsRepository;
use App\Services\Foundation\Auth\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




class ScoreController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $list = News::orderBy('created_at','desc')->paginate(20);
        return view('news/index')->with(compact('list'));

    }

    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['title', 'type', 'content', 'target_id']);
            return $this->repository->create($data);
        }
    }

    public function detail(Request $request)
    {
        if ($request->method() == 'GET') {
            $id = $request->only(['id']);
            $detail = News::find($id)->toArray();
            return view('news/detail')->with(compact('detail'));
        }
    }

    public function my_score(Request $request)
    {
        return view('score/my_score');
    }
}
