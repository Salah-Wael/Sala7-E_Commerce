<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(locale)
    {
        $request->session()->put('locale', $request->locale);
        return redirect()->back();
    }
}
