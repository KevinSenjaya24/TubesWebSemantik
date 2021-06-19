<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jemaat;
use Storage;

class JemaatController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jemaat = Jemaat::get();
        $data = ['jemaat'=>$jemaat];
        return $data;
    }

    public function details($id)
    {
        $jemaat = Jemaat::find($id);

        return $jemaat;
    }

    public function create(Request $request)
    {
        $data = new Jemaat;

        $data->nik =  $request->nik;
        $data->family_id =  $request->family_id;
        $data->status_keanggotaan =  $request->status_keanggotaan;
        $data->nama =  $request->nama;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tanggal_lahir =  $request->tanggal_lahir;
        $data->jenis_kelamin =  $request->jenis_kelamin;
        $data->alamat =  $request->alamat;
        $data->no_telp =  $request->no_telp;
        $data->status =  $request->status;
        $data->pekerjaan =  $request->pekerjaan;
        $data->hobi =  $request->hobi;
        $data->baptis =  $request->baptis;
        
        $status = $data->save();

       
        return "Data Tersimpan";
    }

    public function update(Request $request, $id) 
    {
        $data = Jemaat::find($id);

        $data->nik =  $request->nik;
        $data->family_id =  $request->family_id;
        $data->status_keanggotaan =  $request->status_keanggotaan;
        $data->nama =  $request->nama;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tanggal_lahir =  $request->tanggal_lahir;
        $data->jenis_kelamin =  $request->jenis_kelamin;
        $data->alamat =  $request->alamat;
        $data->no_telp =  $request->no_telp;
        $data->status =  $request->status;
        $data->pekerjaan =  $request->pekerjaan;
        $data->hobi =  $request->hobi;
        $data->baptis =  $request->baptis;
        
        $status = $data->save();

       
        return "Data Terupdate";
    }

    public function delete($id)
    {
        $jemaat = Jemaat::find($id);
        $jemaat->delete();

        return "Data Terhapus";
    }

}
