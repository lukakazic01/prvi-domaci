<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class AdminContactController extends Controller
{
    public function delete(ContactModel $contact) {
        $contact->delete();
        return redirect()->back();
    }

    public function all() {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }

    public function store(ContactRepository $contactRepository, ContactRequest $request) {
        $contactRepository->create($request);
        return redirect()->route('admin.contacts.all');
    }

    public function edit(ContactModel $contact) {
        return view('admin.editContact', compact('contact'));
    }

    public function update(ContactRequest $request, ContactModel $contact, ContactRepository $contactRepository) {
        $contactRepository->update($request, $contact);
        return redirect()->route('admin.contacts.all');
    }
}
