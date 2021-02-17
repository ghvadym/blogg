<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search) {
            $posts = Post::join('users', 'author_id', '=', 'users.id') //Связываем author_id с users id
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('desc', 'like', '%'.$request->search.'%')
                ->orWhere('name', 'like', '%'.$request->search.'%')
                ->orderBy('posts.created_at', 'desc')
                ->get();
            return view('pages.home', compact('posts'));
        }

        $posts = Post::join('users', 'author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc')
            ->simplePaginate(10);
        return view('pages.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->desc = $request->desc;
        $post->author_id = \Auth::user()->id;

        if($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post has been created successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::join('users', 'author_id', '=', 'users.id')->find($id);

        if(!$post) {
            return redirect()->route('post.home')->withErrors('You went in the wrong place');
        }

        return view('pages.show', compact('post'));
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

        if($post->author_id != \Auth::user()->id) {
            return redirect()->route('post.home')->withErrors('You cannot edit this post: ' . $post->title . ', because you are not the author');
        }

        return view('pages.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if($post->author_id != \Auth::user()->id) {
            return redirect()->route('post.home')->withErrors('You can\'t edit this post: ' . $post->title . ', because you\'re not the author');
        }

        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->desc = $request->desc;
        if($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->save();
        $id = $post->post_id;

        return redirect()->route('post.show', compact('id'))->with('success', 'Post has been editing successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->author_id != \Auth::user()->id) {
            return redirect()->route('post.home')->withErrors('You cannot edit this post: ' . $post->title . ', because you are not the author');
        }

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post has been destroy !!!');
    }
}
