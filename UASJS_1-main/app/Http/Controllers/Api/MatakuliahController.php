<?php

namespace App\Http\Controllers\Api;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MatakuliahResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        // $matakuliahs = Matakuliah::latest()->paginate(5);
         return new MatakuliahResource(true, 'List Data Matakuliah',$matakuliahs);
        //return 'tes';
    }
    
    public function store(Request $request)
     {
        // define validation rules
        $validator = Validator::make($request->all(),[
            'id_mk'=> 'required',
            'matakuliah'=> 'required',
         ]);
         if ($validator->fails()){
            return response()->json($validator->errors(),422);
         }
            
        $matakuliah = Matakuliah::create([
            'id_mk' =>$request->id_mk,
            'matakuliah'=>$request->matakuliah,
        ]);
        return new MatakuliahResource(true, 'Data Matakuliah berhasil ditambahkan!',$matakuliah);
    }

    public function show($id)
    {
        //find matakuliah by ID
        $matakuliah = Matakuliah::find($id);

        return new MatakuliahResource(true, 'Detail data Matakuliah',$Matakuliah);
    }
    //define validation

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'id_mk' => 'required',
            'matakuliah' => 'required',
        ]);
        //cek if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(),442);
        }
        //find kelas by id
        $matakuliah = Matakuliah ::find($id);
        // cek  is not empty
        if ($validator->fails()){
            $matakuliah->update([
                'id_mk'=> $request->id_mk,
                'matakuliah'=> $request->matakuliah,
            ]);

        }else{
            //update kelas without gambar
            $matakuliah->update([
                'id_mk' => $request->id_mk,
                'matakuliah'=> $request->matakuliah,
            ]);

        }
        //return response
        return new MatakuliahResource(true,'data matakuliah berhasil diubah!', $matakuliah);
    }
    public function destroy($id)
    {
        //find kelas by id
        $matakuliah=Matakuliah::find($id);
        //hapus kelas
        $matakuliah->delete();
        // return response
        return new MatakuliahResource(true, 'data berhasil dihapus!' ,null);
    }


}
