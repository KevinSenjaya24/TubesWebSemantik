<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Family;
use App\Jemaat;
use Storage;

class FamilyController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $family = Family::get();
        $data = ['family'=>$family];
        return $data;
    }

    public function details($id)
    {
        $family = Family::find($id);

        return $family;
    }

    public function show($id)
    {
        $jemaat = Jemaat::where('family_id', $id)->get();
        return $jemaat;
    }


    public function create(Request $request)
    {
        $data = new Family;

        $data->nkk = $request->nkk;
        $data->kepala_keluarga = $request->kepala_keluarga;
        
        $status = $data->save();

       
        return "Data Tersimpan";
    }

    public function update(Request $request, $id) 
    {
        $data = Family::find($id);

        $data->nkk = $request->nkk;
        $data->kepala_keluarga = $request->kepala_keluarga;
        
        $status = $data->save();

       
        return "Data Terupdate";
    }

    public function delete($id)
    {
        $family = Family::find($id);
        $family->delete();

        return "Data Terhapus";
    }

}
