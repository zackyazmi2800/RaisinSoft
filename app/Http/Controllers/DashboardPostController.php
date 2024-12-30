<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.post', [
            'posts' => Post::all()
        ]);
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Validasi tipe file dan ukuran maksimal 2MB
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Post::create([
            'image_path' => $imagePath,
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Validasi opsional untuk tipe file dan ukuran maksimal 2MB
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->update(['image_path' => $imagePath]);
        }
    
        $post->update([
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
        ]);
    
        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil diupdate.');
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
