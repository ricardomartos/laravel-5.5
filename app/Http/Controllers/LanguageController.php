<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->route('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function set(request $request)
    {   
        App::setLocale($request->language);
        Artisan::call('cache:clear');
        

        return redirect()->route('home');
        //return view('home');
    }
    public function changeLocale(Request $request)
    {
        $this->validate($request, ['locale' => 'required|in:es,en']);

        \Session::put('locale', $request->locale);

        return redirect()->route('home');
    }
}