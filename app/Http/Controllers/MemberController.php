<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use DB;
use Hash;
class MemberController extends Controller
{
    public function index(){
        $member = DB::table('user')
        ->orderBy('user_id')
        ->get();
        return view('member/index',compact('member'));
    }

    public function create(){
        return view (
            'member/form',
            [
                'url'=>'member.store'
            ]
            );
    }

    public function store(Request $request, UserModel $member){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'role'=>'required',
            'password'=>'required',
            
        ]);

        if($validator->fails()){
            return redirect()
            ->route('member.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $hash =  Hash::make($request->password);
            $member->username = $request->input('username');
            $member->role = $request->input('role');
            $member->password = $hash;
            
            $member->save();

            // $id=$member->id_ta;
            // DB::table('tb_kriteria_wp')->insert([
            //     'id_ta'=>$id]);

            return redirect()
            ->route('member')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(UserModel $member){
        return view(
            'member/form',compact('member')
        );
    }

    public function update(Request $request,UserModel $member){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('member.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $hash =  Hash::make($r->password);
            $member->nama = $request->input('username');
            $member->role = $request->input('role');
            $member->keterangan = $hash;
            
            $member->save();

            return redirect()
            ->route('member')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(UserModel $member){
        $member->forceDelete();
        return redirect()->route('member')
        ->with('message','Data Berhasil Dihapus');
    }
}
