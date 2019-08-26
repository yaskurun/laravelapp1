<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    //
    public function index(){
        $data['pegawai'] = Pegawai::paginate(15);
        return view("pegawai.index",$data);
        
    }
    
    public function cari(Request $request){
        $data['pegawai'] = Pegawai::where("nama", "like", "%".$request->cari."%")->paginate();
        return view("pegawai.index",$data);
    }
    
    public function tambah(){
        return view("pegawai.tambah");
    }
    
    public function store(Request $request){
        $this->validate($request,[
           'nama'=>'required', 
           'alamat'=>'required', 
        ]);
        $request->offsetUnset("_token");
        Pegawai::create($request->all());
        return redirect("/pegawai");
    }
    
    public function edit($id){
        $data['pegawai'] = Pegawai::find(["id"=>$id]);
        return view("pegawai.edit",$data);
    }
    
    public function update(Request $request){
        $this->validate($request,[
           'nama'=>'required', 
           'alamat'=>'required', 
        ]);
        $request->offsetUnset("_token");
        $pegawai = Pegawai::find($request->id);
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();
        return redirect("/pegawai");
    }
    
    public function hapus($id){
        Pegawai::find($id)->delete();
        return redirect("/pegawai");
    }
}
