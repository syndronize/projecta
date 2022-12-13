<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SewaModel;
use App\Models\UserModel;
use App\Models\PenilaianModel;
use App\Models\BarangModel;
use DB;
use Validator;

class SewaController extends Controller
{
    public function index(){
        $sewa = DB::table('sewa')
        ->selectRaw(
            'barang.harga * sewa.jumlah as total, barang.nama, user.username, sewa.*'
        )
        ->leftjoin('user','user.user_id','=','sewa.user_id')
        ->leftjoin('barang','barang.id','=','sewa.barang_id')
        ->orderBy('sewa.id')
        ->get();
        return view('sewa/index',compact('sewa'));
    }

    public function create(){
        $barang = BarangModel::all();

        return view (
            'sewa/form',
            [
                'url'=>'sewa.store',
                'barang' => $barang,
            ]
            );
    }

    public function store(Request $request, SewaModel $sewa){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'barang_id'=>'required',
            'jumlah'=>'required',
            'lama_sewa'=>'required',
            'tgl_kembali'=>'required',
            'aktif'=>'required',
            
        ]);

        if($validator->fails()){
            return redirect()
            ->route('sewa.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $sewa->user_id = $request->input('user_id');
            $sewa->barang_id = $request->input('barang_id');
            $sewa->jumlah = $request->input('jumlah');
            $sewa->lama_sewa = $request->input('lama_sewa');
            $sewa->tgl_kembali = $request->input('tgl_kembali');
            $sewa->aktif = $request->input('aktif');
            $sewa->save();

            // $id=$sewa->id_ta;
            // DB::table('tb_kriteria_wp')->insert([
            //     'id_ta'=>$id]);

            return redirect()
            ->route('sewa')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(SewaModel $sewa){
        $barang = BarangModel::all();
        return view(
            'sewa/form',compact('sewa','barang')
        );
    }

    public function update(Request $request,SewaModel $sewa){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'barang_id'=>'required',
            'jumlah'=>'required',
            'lama_sewa'=>'required',
            'tgl_kembali'=>'required',
            'aktif'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('sewa.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $sewa->user_id = $request->input('user_id');
            $sewa->barang_id = $request->input('barang_id');
            $sewa->jumlah = $request->input('jumlah');
            $sewa->lama_sewa = $request->input('lama_sewa');
            $sewa->tgl_kembali = $request->input('tgl_kembali');
            $sewa->aktif = $request->input('aktif');
            
            $sewa->save();

            return redirect()
            ->route('sewa')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(SewaModel $sewa){
        // $id=$sewa->id_ta;
        // DB::table('tb_kriteria_wp')->where('id_ta',$id)->delete();
        $sewa->forceDelete();
        return redirect()
        ->route('sewa')
        ->with('message','Data Berhasil Dihapus');
    }

    public function kembalikan(Request $request, PenilaianModel $penilaian){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'barang_id'=>'required',
            'sewa_id'=>'required',
            'peforma'=>'required',
            'kualitas'=>'required',
            'pelayanan'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }else{
            $penilaian->user_id = $request->input('user_id');
            $penilaian->barang_id = $request->input('barang_id');
            $penilaian->sewa_id = $request->input('sewa_id');
            $penilaian->peforma = $request->input('peforma');
            $penilaian->kualitas = $request->input('kualitas');
            $penilaian->pelayanan = $request->input('pelayanan');
            $penilaian->save();
            
            return redirect()
            ->back()
            ->with('message','Data Berhasil Disimpan');
        }
    }
}
