<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\MoneybirdContact;
use App\Models\Opdracht;

use \Carbon\Carbon;


class CalendarEventController extends Controller
{
    public static function getOpdrachten(Request $request)
    {
        $start = Carbon::parse($request->query('start'));
        $end = Carbon::parse($request->query('end'));

        $opdrachten = Opdracht::where([
            ['start_datum', '>=', $start],
            ['eind_datum', '<=', $end],
        ])->get();

        $eventsJson = $opdrachten->map(function($opdracht) {
            return [
                "title" => $opdracht->titel,
                "start" => $opdracht->start_datum,
                "end" => $opdracht->eind_datum,
            ];
        });

        // return ["test" => $start->format('d-m-Y')];
        return $eventsJson;
    }
    
}
