<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        ret
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
