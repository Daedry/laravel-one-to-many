<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->get();
        // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request->all());

        // Validare i dati
        $val_data = $request->validated();

        // Generare lo slug
        $slug = Post::generateSlug($request->title);
        // $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        // Creiamo la risorsa 
        Post::create($val_data);

        // Redirect
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     *
     */
    public function update(PostRequest $request, Post $post)
    {
        // dd($request->all());

        // validare i dati
        $val_data = $request->validated();
        // dd($val_data);


        // Validazione unique, in questo caso al posto di PostRequest usiamo Request, se no andiamo a farlo subito nel PostRequest
        // $val_data = $request->validate([
        //     'title' => ['required', Rule::unique('posts')->ignore('post'), 'max:150'],
        //     'content' => ['nullable'],
        //     'cover_image' => ['nullable'],
        // ]);


        // Generate slug
        $slug = Post::generateSlug($request->title);
        // $slug = Str::slug($request->title, '-');
        // dd($slug);
        $val_data['slug'] = $slug;

        // update the resource
        $post->update($val_data);

        // redirect to get route
        return redirect()->route('admin.posts.index')->with('message', "$post->title  Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "$post->title Post deleted successfully");
    }
}
