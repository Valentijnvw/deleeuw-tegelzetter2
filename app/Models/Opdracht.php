<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\MoneybirdController;


class Opdracht extends Model
{
    use HasFactory;
    protected $table = 'opdrachten';

    
    public function user()
    {   
        return $this->belongsTo(User::class, 'klant_moneybird_id', 'moneybird_id');
    }

    public function moneybirdContact()
    {
        return $this->belongsTo(MoneybirdContact::class, 'klant_moneybird_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titel',
        'start_datum',
        'start_tijd',
        'eind_datum',
        'eind_tijd',
        'omschrijving',
        'klant_moneybird_id',
        'aannemer_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
}
