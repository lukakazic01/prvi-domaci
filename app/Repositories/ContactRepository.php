<?php

namespace App\Repositories;

use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;

class ContactRepository
{

    public function __construct(
        public ContactModel $contactModel,
    ) {}

    public function create(ContactRequest $request): void
    {
        $this->contactModel::query()->create($request->validated());
    }

    public function update(ContactRequest $request, ContactModel $contact): void
    {
        $contact->update($request->validated());
    }

}
