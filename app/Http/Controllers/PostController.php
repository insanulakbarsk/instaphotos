<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{

    public function __construct(){
        $this -> middleware('auth')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $post = new Post;
        $user = Auth::user();
        
        $post->content = $request['content']; 
        $post->user_id = $user->id; 

        $tags_arr = explode(',', $request['tags']);
        $tag_ids = [];
        foreach($tags_arr as $tag_name){
            $tag = Tag::firstOrCreate([
                   'tag_name' => $tag_name
            ]);
            $tag_ids[] = $tag->id;
        }

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file -> move('uploads/post', $filename);
            $post -> image = $filename;
        }
        else{
            /* return $request; */
            $post -> image = '';
        }
        
        $post->save();
        $post->tags()->sync($tag_ids);

        Alert::success('Success', 'Tweet added');
        
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
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

        return view('post.edit', compact('post'));
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
        $update = Post::where('id', $id)
                  ->update([
                    "content" => $request["content"]
                  ]);

        return redirect('post');
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

        return redirect('post');
    }
}
