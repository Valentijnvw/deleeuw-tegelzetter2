<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\RedirectResponse;

use App\Models\Opdracht;
use App\Models\User;
use App\Services\MoneybirdContactService;

use \Carbon\Carbon;

class OpdrachtController extends Controller
{
    // Views

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
            return $user->hasRole('Aannemer');
        });
        return view('opdracht.create', [
            "aannemerList" => $aannemers,
        ]);
    }

    public function bewerken(Request $request): View
    {
        $opdracht = Opdracht::find($request->opdracht);

        $imageUrls = Storage::files('public/opdrachten/' . $opdracht->id . '/fotos');
        $imageUrls = collect($imageUrls)->map(function($image) {
            return Storage::url($image);
        });

        return view('opdracht.bewerken', [
            'opdracht' => $opdracht,
            'aannemerList' => User::all()->where(function($user) {
                return $user->hasRole('Aannemer');
            }),
            'imageUrlList' => $imageUrls,
        ]);
    }
    
    public function calendar(Request $request): View
    {
        return view('opdracht.calendar');
    }

    // Post actions (with redirects)

    public function store(Request $request): Redirect
    {
        $files = $request->file('fotos');
        if($request->hasFile('fotos')) {
            foreach ($files as $file) {
                // Size validation
                if($file->getSize() > 1000000) {
                    $fileName = $file->getClientOriginalName();
                    return back()->with('errorMessage', 'Een (of meerdere) van de bestanden (' . $fileName . ') is te groot. Upload a.u.b. een bestand van minder dan 10 MB');
                }
                $validExtensions = [
                    "jpg",
                    "png",
                    "jpeg",
                ];
                // Type validation
                if(!in_array($file->getClientOriginalExtension(), $validExtensions)) {
                    $validExtensionsStr = join(", ", $validExtensions);
                    return back()->with('errorMessage', 'Ongeldig bestandstype. Kies uit: ' . $validExtensionsStr);
                }
            }
        }
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

        foreach ($files as $file) {
            $path = $file->store('opdrachten/' . $opdracht->id . '/fotos', 'public');
        }

        return Redirect::route('opdracht.list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'opdrachtId' => 'required',
            'titel' => 'required',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date',
            'omschrijving' => 'required',
            'aannemer_user_id' => 'required',
        ]);
        
        $validated["start_datum"] = \Carbon\Carbon::parse($validated["start_datum"])->format("Y-m-d");
        $validated["eind_datum"] = \Carbon\Carbon::parse($validated["eind_datum"])->format("Y-m-d");

        $opdracht = Opdracht::find($request->opdrachtId);
        $opdracht->fill($validated);
        $opdracht->save();

        return back()->with('successMessage', 'Wijzigingen opgeslagen');
    }

    public function verwijderen(Request $request)
    {
        Opdracht::destroy($request->opdracht_verwijder_id);
        return back()->with('successMessage', 'De opdracht is verwijderd uit het systeem');
    }

    // API
    public static function getCalendarOpdrachten(Request $request): Object
    {
        $start = Carbon::parse($request->query('start'));
        $end = Carbon::parse($request->query('end'));
        $opdrachten = Opdracht::where([
            ['start_datum', '>=', $start],
            ['start_datum', '<=', $end],
        ])
            ->orWhere([
                ['eind_datum', '>=', $start],
                ['eind_datum', '<=', $end],
            ])
            ->orWhere([
                ['start_datum', '<=', $start],
                ['eind_datum', '>=', $end],
            ])
            ->get();

        $eventsJson = $opdrachten->map(function($opdracht) {
            $titlePrefix = $opdracht->aannemerUser ? $opdracht->aannemerUser->displayname() . ': ' : '';
            return [
                "title" => $titlePrefix . $opdracht->titel,
                "start" => $opdracht->start_datum,
                "end" => $opdracht->eind_datum,
                "extendedProps" => [
                    "opdrachtId" => $opdracht->id,
                    "aannemerNaam" => $opdracht->aannemerUser?->displayName(),
                ],
            ];
        });

        return $eventsJson;
    }

    public function getOpdrachten(Request $request)
    {
        $opdrachten = Opdracht::all()
            ->where('status', $request->query("status"))
            ->map(function($opdracht) {
            $moneybirdContact = $opdracht->moneybirdContact;
            $aannemer = $opdracht->aannemerUser;
            $opdracht['naamKlant'] = $moneybirdContact?->displayName();
            $opdracht["aannemer"] = $aannemer?->displayName();
            return $opdracht;
        });

        return ['data' => $opdrachten];
    }
}
