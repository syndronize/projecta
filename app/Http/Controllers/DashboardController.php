<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Validator;

class DashboardController extends Controller
{

    public function dashboard(){
        $data = DB::table('penilaian')
        ->selectRaw('penilaian.*,barang.nama')
        ->leftJoin('user','user.user_id','=','penilaian.user_id')
        ->leftJoin('barang','barang.id','=','penilaian.barang_id')
        ->leftJoin('sewa','sewa.id','=','penilaian.sewa_id')
        ->orderBy('penilaian.id')
        ->get();

        //Nilai Pembobotan
        $maxc1=DB::table('penilaian')->max('peforma');
        $maxc2=DB::table('penilaian')->max('kualitas');
        $maxc3=DB::table('penilaian')->max('pelayanan');
        // dd($minc2);
        foreach ($data as $no => $row) {
            //Pembobotan
            $bobotc1 = 0.3;
            $bobotc2 = 0.3;
            $bobotc3 = 0.4;


            //Penilaian 1
            $nilaic1 = ($row->peforma != null ? $maxc1/$row->peforma : 0);
            $nilaic2 = ($row->kualitas != null ? $maxc2/$row->kualitas : 0);
            $nilaic3 = ($row->pelayanan != null ? $maxc2/$row->pelayanan : 0);

            //Penilaian Akhir
            $nilaiakhir=($nilaic1*$bobotc1)+($nilaic2*$bobotc2)+($nilaic3*$bobotc3);
            // dd($nilaiakhir);
            $save=DB::table('penilaian')->where('id', $row->id)
            ->update([
                'nilai_akhir' =>$nilaiakhir
            ]);
        }
        return view('dashboard',compact('data'));
    }
    public function login(){
        return view('auth/login');
    }

    public function register(){
        return view('auth/register');
    }

    public function registerakun(Request $r){
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'username' => $r->username,
            'role' => $r->role,
            'password' => Hash::make($r->password),
        );
        $simpan = DB::table('user')->insert($data);
        if($simpan){
            return redirect('/')->with('alert','Berhasil Menambahkan Data');
        }else{
            return redirect('/register')->with('alert','Gagal Menambahkan Data');
        }

    }

    public function aksiLogin(Request $r){
        $this->validate($r, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = DB::table('user')
                ->where('username',$r->username)
                ->first();
        if($user){
            if(Hash::check($r->password,$user->password)){
                session()->put('user_id',$user->user_id);
                session()->put('role',$user->role);
                session()->put('username',$user->username);
                return redirect('/dashboard')->with('success','Selamat Datang');
            }else{
                return redirect('/')->with('error','Password Salah');
            }
        }else{
            return redirect('/')->with('error','Username Tidak Ditemukan');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/')->with('success','Berhasil Keluar');
    }

    
}
