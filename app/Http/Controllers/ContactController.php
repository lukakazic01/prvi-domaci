<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $hour = (int) now('Europe/Belgrade')->format('H');
        $currentTime = now('Europe/Belgrade')->format('H:i:s');
        return view('contact', compact('hour', 'currentTime'));
    }
}
