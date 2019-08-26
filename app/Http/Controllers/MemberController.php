<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller {

    //
    public function index() {
        $data['member'] = DB::table("member")->paginate(10);
        return view("member.index", $data);
    }

    public function cari(Request $request) {
        $cari = $request->cari;
        $data['member'] = DB::table("member")
                ->where("nama", "like", "%" . $cari . "%")
                ->paginate();
        return view("member.index", $data);
    }
    
    public function tambah(){
        return view("member.tambah");
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'umur' => 'required'
        ]);
        $request->offsetUnset('_token');
        DB::table('member')->insert($request->all());
        return redirect("/member");
    }
    
    public function edit($id){
        $data['member'] = DB::table("member")->where("id",$id)->get();
        return view("member.edit",$data);
    }
    
    public function update(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
        ]);
        $request->offsetUnset('_token');
        DB::table('member')->where('id',$request->id)->update($request->all());
        return redirect("/member");
    }
    
    public function hapus($id){
        DB::table("member")->where("id",$id)->delete();
        return redirect("/member");
    }

}
