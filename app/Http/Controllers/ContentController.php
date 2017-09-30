<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    public function index() {
        return view('pages.home');
    }
    public function struttura($anchor = 'mission') {
        $content = Content::all()->wherein('slug', ['mission', 'impegni', 'azienda', 'gruppo', 'gallery']);
        foreach ($content as $item) {
            $bodySlug[$item->slug] = $item->body;
        }
        return view('pages.la_struttura', compact('anchor', 'bodySlug'));
    }
    public function attivita() {
        return view('pages.attivita');
    }
    public function accoglienza() {
        return view('pages.accoglienza');
    }
    public function medici() {
        return view('pages.medici');
    }
    public function news() {
        return view('pages.news');
    }
    public function contatti() {
        return view('pages.contatti');
    }
}
