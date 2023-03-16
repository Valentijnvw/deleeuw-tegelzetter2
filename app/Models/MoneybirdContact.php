<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneybirdContact extends Model
{

    public function opdrachten()
    {
        return $this->hasMany(Opdracht::class, 'klant_moneybird_id', 'id');
    }

    // private function storeData()
    // {
    //     $contact = Moneybird::contact()->find($this->id);
    //     $this->fill($contact->attributes());
    //     $this->save();
    // }

    protected $fillable = [
        'id',
        'email',
        'firstname',
        'lastname',
        'company_name',
        'address1',
        'address2',
        'zipcode',
        'city',
        'country',
        'phone',
    ];

    
}
