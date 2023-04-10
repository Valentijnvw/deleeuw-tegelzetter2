<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneybirdContact extends Model
{

    public function opdrachten()
    {
        return $this->hasMany(Opdracht::class, 'klant_moneybird_id', 'id');
    }

    // bedrijfsnaam of volledige naam
    public function displayName()
    {
        return $this->isBedrijf() ? $this->firstname . " " . $this->lastname : $this->company_name;
    }

    public function isBedrijf()
    {
        return empty($this->company_name);
    }

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
