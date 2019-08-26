<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    //
    function index(){
        $nama = "Test";
        $materi = ["HTML","CSS","JS","MYSQL","PHP"];
        return view("biodata",["nama"=>$nama,"materi"=>$materi]);
    }
}
