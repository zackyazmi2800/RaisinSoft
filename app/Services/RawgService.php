<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RawgService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.rawg.io/api';
        $this->apiKey = env('RAWG_API_KEY');
    }

    public function getGames($params = [])
    {
        $params['key'] = $this->apiKey;
        $response = Http::get("{$this->baseUrl}/games", $params);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => $response->status(),
            'message' => $response->body(),
        ];
    }

    // New method to fetch a game by ID
    public function getGameById($id)
    {
        $response = Http::get("{$this->baseUrl}/games/{$id}", [
            'key' => $this->apiKey
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => $response->status(),
            'message' => $response->body(),
        ];
    }
}
