<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\JemaatExport;
use App\Imports\JemaatImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Jemaat;
use App\Family;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Storage;

class JemaatController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = Jemaat::get();
        return view('admin.jemaat.index', ["jemaats"=>$data, ]);
    }

    public function indexJSON(Request $request)
    {
        $jemaat = Jemaat::all();
        return response()->json($jemaat);
    }


    public function details(Request $request)
    {
        $data = Jemaat::find($request->id);
        $family = Family::get();
        return view('admin.jemaat.detail',["jemaat"=>$data, "families"=>$family]);
    }

    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Jemaat::find($request->id);
        }else{
            $data = new Jemaat;
        }
            
        // update data variable
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
        
        //record data to database
        $status = $data->save();
        //redirect with message
        if($status){
            return redirect('jemaat')->with('success', 'Congrats Jemaat Saved Successfully!');
        }
        return redirect('jemaat')->with('error', 'Jemaat Fail to Create!');
    }

    public function delete($id)
    {
        $jemaat = Jemaat::find($id);
        $jemaat->delete();
        return redirect('jemaat')->with('success', 'Congrats Jemaat Deleted Successfully');
    }

}
