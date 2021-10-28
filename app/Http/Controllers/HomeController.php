<?php


namespace App\Http\Controllers;


use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use TCG\Voyager\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client([
            'base_uri' => 'https://domingoasdez.com/',
            'timeout' => 5,
            'allow_redirects' => false,
            'verify' => false,
        ]);

        try {
            $response = $client->get('/api/games/next/2');
            $nextGame = json_decode($response->getBody()->read($response->getBody()->getSize()));
            //dd($nextGame);
        } catch (Exception $e) {
            Log::error("Error calling DomingoAsDez: " . $e->getMessage());
            $nextGame = new \stdClass();
            $nextGame->has_game = false;
        }

        $homePage = Page::where('slug', 'home')->first();

        return view('home', ['nextGame' => $nextGame, 'homePage' => $homePage]);
    }
}
