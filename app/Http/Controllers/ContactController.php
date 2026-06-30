<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;

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

    public function sendContact(ContactRequest $request) {
        ContactModel::query()->create([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('admin.allContacts');
    }

    public function edit(ContactModel $contact) {
        return view('admin.editContact', compact('contact'));
    }
    public function update(ContactRequest $request, ContactModel $contact) {
        $contact->update([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);
        return redirect()->route('admin.allContacts');
    }
}
