<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        // $kelas = Kelas::latest()->paginate(5);
         return new KelasResource(true, 'List Data Kelas',$kelas);
        //return 'tes';
    }
    
    public function store(Request $request)
     {
        // define validation rules
        $validator = Validator::make($request->all(),[
             'kelas'=> 'required',
             'jam'=> 'required',
             'id_mk'=> 'required',
         ]);
         if ($validator->fails()){
            return response()->json($validator->errors(),422);
         }
        // buat kelas
        $kelas = Kelas::create([
            'kelas' =>$request->kelas,
            'jam' =>$request->jam,
            'id_mk' =>$request->id_mk,
        ]);
        return new KelasResource(true, 'Data Kelas berhasil ditambahkan!',$kelas);
    }

    public function show($id)
    {
        //find kelas by ID
        $kelas = Kelas::find($id);

        return new KelasResource(true, 'Detail data Kelas',$Kelas);
    }
    //define validation

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'kelas' => 'required',
            'jam' => 'required',
            'id_mk' => 'required',
        ]);
        //cek if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(),442);
        }
        //find kelas by id
        $kelas = Kelas ::find($id);
        // cek  is not empty
        if ($validator->fails()){
            $kelas->update([
                'kelas'=> $request->kelas,
                'jam'=> $request->jam,
                'id_mk'=> $request->id_mk,
            ]);

        }else{
            //update kelas 
            $kelas->update([
                'kelas' => $request->kelas,
                'jam'=> $request->jam,
                'id_mk'=> $request->id_mk,
            ]);

        }
        //return response
        return new KelasResource(true,'data kelas berhasil diubah!', $kelas);
    }
    public function destroy($id)
    {
        //find kelas by id
        $kelas=Kelas::find($id);
        //hapus kelas
        $kelas->delete();
        // return response
        return new KelasResource(true, 'data berhasil dihapus!' ,null);
    }


}
