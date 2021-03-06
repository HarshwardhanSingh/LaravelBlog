<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Like;

class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('created_at')->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Post::$create_validation_rules);
        $data = $request->only('title','content','slug');
        $data['user_id'] = \Auth::user()->id;
        // dd($data);
        $post = Post::create($data);
        if($post)
        {
          return redirect()->route('posts.index');
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,Post::$update_validation_rules);
        $data = $request->only('title','content','slug');
        $post = Post::find($id);
        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    public function like($id)
    {
      $data['post_id'] = $id;
      $data['user_id'] = \Auth::user()->id;
      Like::create($data);
      return back();
    }

    public function unlike($id)
    {
      $data['post_id'] = $id;
      $data['user_id'] = \Auth::user()->id;
      $like = Like::whereUserIdAndPostId(\Auth::user()->id,$id)->first();
      // dd($like);
      Like::destroy($like->id);
      return back();
    }
}
