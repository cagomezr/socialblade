<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('home',['posts' => $posts]);
    }
    public function directory()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('directory',['users' => $users]);
    }
    public function processPost(Request $request){
		$post =new Post();
		$post ->user_id = Auth::user()->id;
		$post ->body = $request->body;
		$post ->save();
		return redirect(route("home"));
	}
    public function processComment(Request $request, $post_id){
		$comment =new Comment();
		$comment ->user_id = Auth::user()->id;
        $comment ->post_id = $post_id;
		$comment ->body = $request->comment;
		$comment ->save();
		return redirect(route("home"));
	}
    
}
