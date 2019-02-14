<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jadwal;

class JadwalController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }      
    
    public function index_jadwal(){
        $data = DB::table('jadwal as j')
        ->leftJoin('kelompok as k','k.id','j.kelompok')
        ->leftJoin('tanaman as t','t.id','j.tanaman')
        ->get(['j.id','j.nama','t.nama as tanaman','k.nama as kelompok','j.tgl_masuk','j.tgl_keluar','j.jumlah_tanaman','j.status']);

        return view('admin-page.jadwal.index',compact('data'));
        
    }

    public function create_jadwal(){
        
        $tanaman = DB::table('tanaman')->get();
        $kelompok = DB::table('kelompok')->get();
        
        return view('admin-page.jadwal.create',compact('tanaman','kelompok'));
    }    

    public function store_jadwal(Request $request){
        $data = new Jadwal();
        $data->nama = $request->nama;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->tgl_keluar = $request->tgl_keluar;
        $data->kelompok = $request->kelompok;
        $data->tanaman = $request->tanaman;
        $data->jumlah_tanaman = $request->jumlah_tanaman;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('index_jadwal');
    }
    
    public function edit_jadwal(Request $request,$id){
        $data = Jadwal::find($id);
        $tanaman = DB::table('tanaman')->get();
        $kelompok = DB::table('kelompok')->get();        
        return view('admin-page.jadwal.edit',compact('data','tanaman','kelompok'));
    }
    
    public function update_jadwal(Request $request,$id){
        $data = Jadwal::find($id);
        $data->nama = $request->nama;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->tgl_keluar = $request->tgl_keluar;
        $data->kelompok = $request->kelompok;
        $data->tanaman = $request->tanaman;
        $data->jumlah_tanaman = $request->jumlah_tanaman;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('index_jadwal');
    }

    public function destroy_jadwal($id){
        $data = Jadwal::find($id);
        $data->delete();
        return redirect()->route('index_jadwal')->with('success', 'Kelompok has been deleted Successfully');        
    }  


}
