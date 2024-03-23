<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordlController extends Controller
{
    public function check() {
        return [
            'success' => true,
            'corrects' => [1, 3],
            'wrongPositions' => [5]
        ];
    }
}
