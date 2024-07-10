<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        re
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
