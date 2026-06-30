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

    public function delete(ContactModel $contact) {
        $contact->delete();
        return redirect()->back();
    }

    public function allContacts() {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }

    public function sendContact(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'subject' => 'required|string|min:5',
            'message' => 'required|string|min:5',
        ]);

        ContactModel::query()->create([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect('/shop');
    }
}
