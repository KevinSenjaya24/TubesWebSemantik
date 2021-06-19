<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sitemap;
use App\Family;
use App\Jemaat;

class SitemapController extends Controller
{
    public function indexFamily()
    {
        // // Cara1
        // $fams = Family::all();
        // foreach ($fams as $family) {
        //     Sitemap::addTag(url($family->id), $family->updated_at, 'daily', '0.8');
        // }
        // return Sitemap::render();


        // Cara2
        $data['fams'] = Family::get();
        
        return response()->view('xml.family', $data)->header('Content-Type', 'text/xml');

    }

    public function indexJemaat()
    {
        // // Cara1
        // $jemaats = Jemaat::all();
        // foreach ($jemaats as $jemaat) {
        //     Sitemap::addTag(url($jemaat->id), $jemaat->updated_at, 'daily', '0.8');
        // }
        // return Sitemap::render();

        
        // Cara2
        $data['jemaats'] = Jemaat::get();
        
        return response()->view('xml.jemaat', $data)->header('Content-Type', 'text/xml');

    }
}
