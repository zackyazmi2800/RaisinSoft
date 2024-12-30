<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Menampilkan daftar berita
    public function index()
    {
        $posts = Post::all();  // Ambil semua data post dari database
        return view('home', compact('posts'));  // Kirim ke view home
    }

    // Menampilkan detail berita berdasarkan ID
    public function show($id)
    {
        $post = Post::findOrFail($id);  // Cari post berdasarkan ID
        return view('posts.show', compact('post'));  // Kirim ke view
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
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
