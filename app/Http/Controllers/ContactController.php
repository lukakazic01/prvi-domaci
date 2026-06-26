<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $hour = (int) now('Europe/Belgrade')->format('H');
        $currentTime = now('Europe/Belgrade')->format('H:i:s');
        return view('contact', compact('hour', 'currentTime'));
    }

    public function allContacts() {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }
}
