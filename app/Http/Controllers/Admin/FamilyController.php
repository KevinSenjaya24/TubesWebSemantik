<?php

namespace App\Http\Controllers\Admin;

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
        $data = Family::get();
        return view('admin.family.index',["families"=>$data]);
    }

    public function indexJSON(Request $request)
    {
        $family = Family::all();
        return response()->json($family);
    }

    public function show(Request $request)
    {
        $data = Family::find($request->id);
        $jemaat = Jemaat::where('family_id', $request->id)->get();
        return view('admin.family.show',["families"=>$data, "jemaats"=>$jemaat]);
    }

    public function details(Request $request)
    {
        $data = Family::find($request->id);
        return view('admin.family.detail',["family"=>$data]);
    }


    public function update(Request $request)
    {
        if($request->id){
            $data = Family::find($request->id);
        }else{
            $data = new Family;
        }

        $data->nkk = $request->nkk;
        $data->kepala_keluarga = $request->kepala_keluarga;
        
        $status = $data->save();

       
        if($status){
            return redirect('/family')->with('success', 'Congrats Family Saved Successfully!');
        }
        return redirect('/family')->with('error', 'Family Fail to Create!');
    }

    public function delete($id)
    {
        $family = family::find($id);
        $family->delete();

        return redirect('/family')->with('success', 'Congrats Family Deleted Successfully');
    }

}
