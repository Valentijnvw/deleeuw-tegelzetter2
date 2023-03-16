<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\MoneybirdContact;

// use Casdr\Moneybird\MoneybirdFacade as Moneybird;

// use Picqer\Financials\Moneybird\Entities\Contact;

class MoneybirdContactService
{

    public MoneybirdContact $contact;

    private $moneybirdId = null;

    /*
        Retrieve a Moneybird contact
    */
    public function __construct(Int $moneybirdId) {
        $this->moneybirdId = $moneybirdId;
    }

    public function insertOrUpdateContact()
    {
        $this->contact = MoneybirdContact::where('id', $this->moneybirdId)->firstOr(function() {
            $this->contact = new MoneybirdContact();
            $this->contact->id = $this->moneybirdId;
            $this->updateData();
            return $this->contact;
        });
    }

    public function updateData()
    {
        try {
            $retrievedContact = \Moneybird::contact()->find($this->contact->id);
        } catch(\Exception $e) {
            throw new \Error("Contact niet gevonden");
        }
        $this->contact->fill($retrievedContact->attributes());
        $this->contact->save();
    }
}