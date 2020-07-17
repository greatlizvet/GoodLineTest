<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected function responseView(string $viewName, array $data = [])
    {
        if(Auth::check())
        {
            $userPastas = Pasta::getUserPastas(Auth::user()->id);
            $data['userPastas'] = $userPastas;
        }

        $pastas = Pasta::getPastasList();
        $data['pastas'] = $pastas;
        return view($viewName, $data);
    }
}
