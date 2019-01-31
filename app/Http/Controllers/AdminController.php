<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }    
    
    public function dashboard(){
        $md = DB::table('mediatanam')
        ->orderBy('id', 'desc')
        ->limit(1)        
        ->get(['cahaya','suhu','ph','kt']);


        $cahaya = $md[0]->cahaya;
        $suhu = $md[0]->suhu;
        $ph = $md[0]->ph; 
        $kt = $md[0]->kt;         

        return view('admin-page.dashboard',compact('cahaya','suhu','ph','kt','proses','panen'));
    }

    public function update_state($field,$value){
        $data = State::find($field);
        $data->value = $value;
        $data->save();
        
        return response()->json($data);

    }
    

    public function getTanamanByJadwal(Request $request){
        
        $data = DB::table('jadwal as j')
        ->join('tanaman as t','j.id','t.jadwal')
        ->where('j.id',$request->id)
        ->get();
        
        
        $view = view('admin-page.jadwal.list-tanaman',compact('data'))->render();
        return response()->json(['html'=>$view]);
    }




    
}
