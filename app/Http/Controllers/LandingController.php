<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class LandingController extends Controller
{
    public function welcome() {
        $test = 'HELLO';
        return Inertia::render("Welcome", ['test' => $test]);
    }
}
