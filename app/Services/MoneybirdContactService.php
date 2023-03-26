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
        // Contact ophalen (of aanmaken)
        $this->contact = MoneybirdContact::where('id', $this->moneybirdId)->firstOr(function() {
            $newContact = new MoneybirdContact();
            $newContact->id = $this->moneybirdId;
            return $newContact;
        });
        // API aanvraag
        try {
            $retrievedContact = \Moneybird::contact()->find($this->contact->id);
        } catch(\Exception $e) {
            throw new \Error("Contact niet gevonden");
        }
        $attr = $retrievedContact->attributes();
        // Verwerken in DB
        // $this->contact->fill($retrievedContact->attributes());
        $this->contact->fill([
            "id" => $attr["id"],
            "email" => $attr["email"],
            'firstname' => $attr["firstname"],
            'lastname' => $attr["lastname"],
            'company_name' => $attr["company_name"],
            'address1' => $attr["address1"],
            'address2' => $attr["address2"],
            'zipcode' => $attr["zipcode"],
            'city' => $attr["city"],
            'country' => $attr["country"],
            'phone' => $attr["phone"],
        ]);
        $this->contact->save();
    }

    /* 
        
    */
    public function updateData()
    {

        
    }
}