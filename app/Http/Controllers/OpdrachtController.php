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
            $opdracht['aannemer'] = $opdracht->aannemerUser;
            return $opdracht;
        });
        return view('opdracht.list', [
            'opdrachten' => $opdrachten
        ]);
    }

    public function create(Request $request): View
    {
        $aannemers = User::all()->where(function($user) {
            return $user->hasRole('aannemer');
        });
        return view('opdracht.create', [
            "aannemerList" => $aannemers,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required',
            'klant_moneybird_id' => 'required',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date',
            'omschrijving' => 'required',
            'aannemer_user_id' => 'required',
        ]);
        
        $validated["start_datum"] = \Carbon\Carbon::parse($validated["start_datum"])->format("Y-m-d");
        $validated["eind_datum"] = \Carbon\Carbon::parse($validated["eind_datum"])->format("Y-m-d");

        $moneybirdContactService = new MoneybirdContactService($validated["klant_moneybird_id"]);
        $moneybirdContactService->insertOrUpdateContact();

        $opdracht = new Opdracht();
        $opdracht->fill($validated);
        $opdracht->save();

        return Redirect::route('opdracht.list');
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
