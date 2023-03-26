<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Casdr\Moneybird\MoneybirdFacade as Moneybird;

use Picqer\Financials\Moneybird\Entities\Contact;
use Picqer\Financials\Moneybird\Entities\ContactPeople;

use App\Models\MoneybirdContact;

class MoneybirdController extends Controller
{
    public static function getContact($moneybirdId)
    {
        return MoneybirdContacts::where('id', $moneybirdId)->firstOr(function() {
            return updateOrStoreContact($moneybirdId);
        });
    }

    // public static function updateOrStoreContact(Int $moneybirdId)
    // {
    //     $contact = Moneybird::contact()->find($moneybirdId);
    //     $moneybirdContact = MoneybirdContact::firstOrCreate([
    //         "id" => $moneybirdId
    //     ]);
    //     $moneybirdContact->fill($contact->attributes());
    //     $moneybirdContact->save();
    //     return $moneybirdContact;
    // }

    public function userSearch(Request $request) {
        $query = $request->query('q');
        $contacts = Moneybird::contact()->search($query);
        $contactList = collect($contacts)->map(function(Contact $contact) {
            $contactPeople = collect($contact->contact_people)->map(function(ContactPeople $contact) {
                return [
                    "first_name" => $contact->firstname,
                    "last_name" => $contact->lastname,
                ];
            });
            $contactPerson = null;
            if(count($contactPeople) > 0) {
                $contactPerson = $contactPeople[0];
            }
            return [
                "moneybird_id" => $contact->id,
                "first_name" => $contact->firstname,
                "last_name" => $contact->lastname,
                "company_name" => $contact->company_name,
                "email" => $contact->email,
                "phone" => $contact->phone,
                "city" => $contact->city,
                "contact_person" => $contactPerson,
            ];
        });
        return [
            "items" => $contactList,
        ];
    }
    
}
