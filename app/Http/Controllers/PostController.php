<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\RawgService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $rawgService;

    public function __construct(RawgService $rawgService)
    {
        $this->rawgService = $rawgService;
    }

    public function index()
    {
        $posts = Post::all();
        $games = $this->rawgService->getGames(['page' => 1, 'page_size' => 8]);
        $allGames = $this->rawgService->getGames(['page' => 1, 'page_size' => 40]);

        if (isset($games['error'])) {
            return response()->json([
                'error' => $games['error'],
                'message' => $games['message'],
            ], $games['error']);
        }

        return view('home', compact('posts', 'games', 'allGames'));
    }

    // Method to show detailed game information based on game ID
    public function postGame($id)
    {
        // Fetch detailed game info by ID
        $game = $this->rawgService->getGameById($id);

        if (isset($game['error'])) {
            return response()->json([
                'error' => $game['error'],
                'message' => $game['message'],
            ], $game['error']);
        }

        // Pass game details to the view
        return view('posts.postgame', compact('game'));
    }




    /**
     * Show the specified post.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); // Cari post berdasarkan ID
        return view('posts.show', compact('post')); // Kirim ke view
    }

    // Metode lain (create, store, edit, update, destroy) tetap ada jika diperlukan
}
