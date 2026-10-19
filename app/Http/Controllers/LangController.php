<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App;

class LangController extends Controller
{

    public function index()
 
    {
 
        return view('home');
 
    }
    
  public function change(Request $request)
{
    $locale = $request->query('lang');

    $supportedLocales = ['en', 'fr'];

    if (!in_array($locale, $supportedLocales)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return back();
}
}
