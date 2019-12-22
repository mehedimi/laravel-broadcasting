<?php

namespace App\Http\Controllers;


use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return PostResource::collection(
                Post::with('user')->latest()->paginate()
            );
        }

        return view('home');
    }
}
