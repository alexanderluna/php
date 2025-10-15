<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')
        ->latest()
        ->take(50)
        ->get();
        return view('home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5'
        ], [
            'message.required' => 'Please write something to Post',
            'message.max' => 'Posts must be 255 characters or less',
            'message.min' => 'Please write something longer to Post',
        ]);

        auth()->user()->posts()->create($validated);

        return redirect('/')->with('success', 'Your Post is live now 🎉');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5'
        ]);

        $post->update($validated);

        return redirect('/')->with('success', 'Post was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return redirect('/')->with('success', 'Post was deleted!');
    }
}
