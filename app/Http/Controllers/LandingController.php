<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class LandingController extends Controller
{
    public function welcome() {
        $totalNumberOfGuesses = 6;
        $numberOfLetters = 5;
        $currentGuess = 1;
        return Inertia::render("Welcome", compact('totalNumberOfGuesses', 'numberOfLetters', 'currentGuess'));
    }
}
