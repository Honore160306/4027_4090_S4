<?php

namespace App\Controllers;

class AccueilController extends BaseController
{
    public function accueil(): string
    {
        return view('accueil');
    }
}
