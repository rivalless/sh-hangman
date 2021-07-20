<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/index');
    }

    public function game(Request $request)
    {
        //filtering empty player names
        //$players = array_filter($request->players, fn ($value) => !is_null($value) && $value !== '');
        $players = array_values(array_filter($request->players));
        //fetching the heroes list and transforming it into an array
        $heroes = File::get(public_path('heroes.txt'));
        $heroes = explode(';', $heroes);

        return Inertia::render('Game/index', [
            'heroes' => $heroes,
            'players' => $players
        ]);
    }
}
