<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\BarangModel;
use DB;
use Storage;

class BarangController extends Controller
{
    public function index(){
        $barang = DB::table('barang')
        ->orderBy('id')
        ->get();
        return view('barang/index',compact('barang'));
    }

    public function create(){
        return view (
            'barang/form',
            [
                'url'=>'barang.store'
            ]
            );
    }

    public function store(Request $request, BarangModel $barang){
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'harga'=>'required',
            'keterangan'=>'required',
            'gambar'=>'required|mimes:jpg,jpeg,png,bmp',
            
        ]);

        if($validator->fails()){
            return redirect()
            ->route('barang.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $barang->nama = $request->input('nama');
            $barang->harga = $request->input('harga');
            $barang->keterangan = $request->input('keterangan');
            $barang->gambar = $request->file("gambar")->store("gambar");
            
            $barang->save();

            // $id=$barang->id_ta;
            // DB::table('tb_kriteria_wp')->insert([
            //     'id_ta'=>$id]);

            return redirect()
            ->route('barang')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(BarangModel $barang){
        return view(
            'barang/form',compact('barang')
        );
    }

    public function update(Request $request,BarangModel $barang){
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'harga'=>'required',
            'keterangan'=>'required',
            'gambar'=>'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('barang.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            Storage::delete($barang->gambar);
            $barang->nama = $request->input('nama');
            $barang->harga = $request->input('harga');
            $barang->keterangan = $request->input('keterangan');
            $barang->gambar = $request->file("gambar")->store("gambar");
            
            $barang->save();

            return redirect()
            ->route('barang')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(BarangModel $barang){
        // $id=$barang->id_ta;
        // DB::table('tb_kriteria_wp')->where('id_ta',$id)->delete();
        Storage::delete($barang->gambar);
        $barang->forceDelete();
        return redirect()
        ->route('barang')
        ->with('message','Data Berhasil Dihapus');
    }
}
