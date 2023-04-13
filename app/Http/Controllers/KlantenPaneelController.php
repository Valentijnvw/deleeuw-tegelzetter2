<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\RedirectResponse;

use App\Models\Opdracht;
use App\Models\User;
use App\Services\MoneybirdContactService;

class KlantenPaneelController extends Controller
{
    public function gegevens()
    {
        // return dd(Auth::user()->moneybirdContact);
        return view('klantenpaneel.gegevens');
    }
}
