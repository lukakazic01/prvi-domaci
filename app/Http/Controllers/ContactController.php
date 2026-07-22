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

    public function delete(ContactModel $contact) {
        $contact->delete();
        return redirect()->back();
    }

    public function allContacts() {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }

    public function sendContact(ContactRepository $contactRepository, ContactRequest $request) {
        $contactRepository->create($request);
        return redirect()->route('admin.allContacts');
    }

    public function edit(ContactModel $contact) {
        return view('admin.editContact', compact('contact'));
    }
    public function update(ContactRequest $request, ContactModel $contact, ContactRepository $contactRepository) {
        $contactRepository->update($request, $contact);
        return redirect()->route('admin.allContacts');
    }
}
