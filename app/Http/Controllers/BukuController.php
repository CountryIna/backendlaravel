<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function getbuku()
    {
        $dt_buku= buku::get();
        return response()->json($dt_buku);
    }

    public function getid($id)
    {
        $dt_buku = buku::where('id_buku', '=', $id)->get();
        return response()->json($dt_buku);
    }

    public function create_buku(Request $req)
    {
       $validate = Validator::make($req->all(),
       [
        'judul'=>'required',
        'jenis'=>'required',
        'pengarang'=>'required'
       ]);
       
       if($validate->fails())
       {
        return response()->json($validate->errors()->toJson());
       }
       
       $create = buku::create(
        [
        'judul'=>$req->judul,
        'jenis'=>$req->jenis,
        'pengarang'=>$req->pengarang
        ]);
       
        if($create)
        {
        return response()->json(['status'=>true, 'message'=>'Sukses Menambah Data Buku.']);
        } else{
        return response()->json(['status'=>false, 'message'=>'Gagal Menambah Data Buku.']);
        }
    }

    public function update_buku(Request $req,$id)
    {
       $validate = Validator::make($req->all(),
       [
        'judul'=>'required',
        'jenis'=>'required',
        'pengarang'=>'required'
       ]);
       
       if($validate->fails())
       {
        return response()->json($validate->errors()->toJson());
       }
       
       $update = buku::where('id_buku',$id)->update(
        [
        'judul'=>$req->get('judul'),
        'jenis'=>$req->get('jenis'),
        'pengarang'=>$req->get('pengarang')
        ]);
       
        if($update)
        {
        return response()->json(['status'=>true, 'message'=>'Sukses Mengupdate Data Buku.']);
        } else{
        return response()->json(['status'=>false, 'message'=>'Gagal Mengupdate Data Buku.']);
        }
    }

    public function delete_buku($id)
    {
       $delete = buku::where('id_buku', $id)->delete();
    
       if($delete)
       {
        return response()->json(['status'=>true, 'message'=>'Sukses Menghapus Data Buku.']);
        } else{
        return response()->json(['status'=>false, 'message'=>'Gagal Menghapus Data Buku.']);
        }
    }
}
