<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }
}
