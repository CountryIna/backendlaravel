<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function getmahasiswa()
    {
        $dt_mahasiswa= mahasiswa::get();
        return response()->json($dt_mahasiswa);
    }

    public function getid($id)
    {
        $dt_mahasiswa = mahasiswa::where('id', '=', $id)->get();
        return response()->json($dt_mahasiswa);
    }

    public function create_mahasiswa(Request $req)
    {
       $validate = Validator::make($req->all(),
       [
        'nama'=>'required',
        'jk'=>'required',
        'alamat'=>'required'
       ]);
       
       if($validate->fails())
       {
        return response()->json($validate->errors()->toJson());
       }
       
       $create = mahasiswa::create(
        [
        'nama'=>$req->nama,
        'jk'=>$req->jk,
        'alamat'=>$req->alamat
        ]);
       
        if($create)
        {
        return response()->json(['status'=>true, 'message'=>'Sukses Menambah Data Mahasiswa.']);
        } else{
        return response()->json(['status'=>false, 'message'=>'Gagal Menambah Data Mahasiswa.']);
        }
    }

    public function update_mahasiswa(Request $req,$id)
    {
       $validate = Validator::make($req->all(),
       [
        'nama'=>'required',
        'jk'=>'required',
        'alamat'=>'required'
       ]);
       
       if($validate->fails())
       {
        return response()->json($validate->errors()->toJson());
       }
       
       $update = mahasiswa::where('id',$id)->update(
        [
        'nama'=>$req->get('nama'),
        'jk'=>$req->get('jk'),
        'alamat'=>$req->get('alamat')
        ]);
       
        if($update)
        {
        return response()->json(['status'=>true, 'message'=>'Sukses Mengupdate Data Mahasiswa.']);
        } else{
        return response()->json(['status'=>false, 'message'=>'Gagal Mengupdate Data Mahasiswa.']);
        }
    }

    public function delete_mahasiswa($id)
    {
       $delete = mahasiswa::where('id', $id)->delete();
    
       if($delete)
       {
        return response()->json(['status'=>true, 'message'=>'Sukses Menghapus Data Mahasiswa.']);
    } else{
    return response()->json(['status'=>false, 'message'=>'Gagal Menghapus Data Mahasiswa.']);
    }
    }
}
