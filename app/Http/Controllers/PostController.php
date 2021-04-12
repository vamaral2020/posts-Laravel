<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser= Auth::user()->id;
        $idPost = $post->user_id;

        if($idPost == $idUser){
            $data = Post::orderBy('id')->get();
            return view('posts.index', compact('data'));

        }


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
        $this->validate($request,[

            'title'=>'required',
            'subtitle' =>'required',
            'content' =>'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Post::find($id);

        $idUser= Auth::user()->id;
        $idPost = $item->user_id;


        if($idUser == $idPost){

            return view('posts.show', compact('post'));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idUser= Auth::user()->id;
        $idPost = $post->user_id;

        if($idUser == $idPost){

            $item = Post::findOrFail($id);
            return view('posts.edit', compact('post'));

        }

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
        $item = Post::findOrFail($id);
        $item->fill($request->all())->save();
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
        $item = Post::findOrFail($id);
        $item->delete();
        return redirect()->route('posts.index');
    }
}