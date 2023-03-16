<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Opdracht;
use App\Models\User;
use App\Services\MoneybirdContactService;

class OpdrachtController extends Controller
{
    public function list(Request $request): View
    {
        $opdrachten = Opdracht::all()->map(function($opdracht) {
            $opdracht['contact'] = $opdracht->moneybirdContact;
            return $opdracht;
        });
        return view('opdracht.list');
    }
}
