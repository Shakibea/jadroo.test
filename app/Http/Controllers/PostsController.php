<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->get();
        return view('posts.index', compact('post'));
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
    public function store(CreatePostRequest $request)
    {

        $input = $request->all();

        if($file = $request->file('file')){

           $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name;
        }

        Post::create($input);

//        $file = $request->file('file');
//
//        echo $file->getClientOriginalName();
//
//        echo "<br>";
//
//        echo $file->getSize();

//       echo $file->getClientOriginalName();

//        //this is for 5.2 or above
//        $this->validate($request, [
//            'title' => 'required'
//        ]);

//        //this is only for 5.8
//        $request->validate([
//            'title' => 'required'
//        ]);

//       return $request->all();
//       return $request->get('title');
//       return $request->title;

//        Post::create($request->all());

//        $post = $request->all();
//        $post['title'] = $request->title;
//        Post::create($request->all());
//
//        $post = new Post();
//        $post->title = $request->title;
//        $post->save();

//        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));

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
        //
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();
        return redirect('/posts');

    }

    public function contact(){

        $people = ['james', 'bond', 'shakib', 'ryan'];

        return view('contact', compact('people'));

    }

    public function showMyPost($id, $name, $password){

        return view('post', compact('id', 'name', 'password'));
    }



}
