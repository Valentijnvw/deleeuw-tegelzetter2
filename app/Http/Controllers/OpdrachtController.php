<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

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
        return view('opdracht.list', [
            'opdrachten' => $opdrachten
        ]);
    }

    public function create(Request $request): View
    {
        return view('opdracht.create');
    }

    public function calendar(Request $request): View
    {
        $opdrachten = Opdracht::all()->map(function($opdracht) {
            $opdracht['contact'] = $opdracht->moneybirdContact;
            return $opdracht;
        });
        return view('opdracht.calendar', [
            'opdrachten' => $opdrachten
        ]);
    }

    public function delete(Request $request)
    {
        return Redirect::to('/');
    }
}
