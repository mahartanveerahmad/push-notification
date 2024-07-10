<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PostCreatedEvent;

class PostController extends Controller
{
    //

    public function index(){

        return view('post');
    }

    public function save(Request $request){


        Post::create($request->all());

        $data = [
            'title' => $request->title,
            'author' => $request->author
        ];
        broadcast(new PostCreatedEvent($data));

        return redirect()->back();
    }
}
