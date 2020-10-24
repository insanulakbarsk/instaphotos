<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\PostTag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::limit(3)->get();
        $users = User::inRandomOrder()->limit(3)->get()->except(Auth::id());

        return view('post.index', compact('posts', 'tags', 'users'));
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

        $post->caption = $request['caption'];
        $post->user_id = $user->id;

        $tags_arr = explode(',', $request['tags']);
        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::firstOrCreate([
                'tag_name' => $tag_name
            ]);
            $tag_ids[] = $tag->id;
        }

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/post', $filename);
            $post->img_url = $filename;
        } else {
            /* return $request; */
            $post->img_url = '';
        }

        $post->save();
        $post->tags()->sync($tag_ids);

        Alert::success('Success', 'Post added');

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
        if ($post->user_id != Auth::id()) {
            return redirect('post');
        }

        $post_tags = PostTag::where('post_id', '=', $id)->get();
        $name_arr = [];
        foreach ($post_tags as $tags) {
            $temp_tags = Tag::find($tags->tag_id);
            $name_arr[] = $temp_tags->tag_name;
        }

        $tag_name = implode(',', $name_arr);

        return view('post.edit', compact('post', 'tag_name'));
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
        $post = Post::find($id);
        if ($post->user_id != Auth::id()) {
            return redirect('post');
        }

        $update = Post::where('id', $id)
            ->update([
                "caption" => $request["caption"]
            ]);

        $tags_arr = explode(',', $request['tags']);
        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::firstOrCreate([
                'tag_name' => $tag_name
            ]);
            $tag_ids[] = $tag->id;
        }
        $post->tags()->sync($tag_ids);

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
        $post = Post::find($id);
        if ($post->user_id != Auth::id()) {
            return redirect('post');
        }

        Post::destroy($id);

        return redirect('post');
    }
}
