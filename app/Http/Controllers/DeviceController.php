<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\State;
use PDF;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }     
    
    public function update_state($field,$value){
        $data = State::find($field);
        $data->value = $value;
        $data->save();
        
        return response()->json($data);

    }
    
    
    public function getState(){
        $data = DB::table('state')
        ->get();

        return response()->json($data);
    }

    public function index_laporan(){
        $collection = DB::select("select tanggal from mediatanam
        group by YEAR(tanggal), MONTH(tanggal) 
        order by tanggal desc");

        return view('index_laporan',compact('collection'));
    }

    public function getDetailMT(){
        
        $collection = DB::table('mediatanam')
        ->where('tanggal',date("Y-m-d"))
        ->get();
        
        $cahaya = array();
        $suhu = array();
        $ph = array();
        $kt = array();

        foreach ($collection as $key) {
            array_push($cahaya,$key->cahaya);
            array_push($ph,$key->ph);
            array_push($suhu,$key->suhu);
            array_push($kt,$key->kt);
        }

        $md = DB::table('mediatanam')
        ->orderBy('id', 'desc')
        ->limit(1)        
        ->get(['cahaya','suhu','ph','kt']);


        $cCahaya = $md[0]->cahaya;
        $cSuhu = $md[0]->suhu;
        $cPh = $md[0]->ph; 
        $cKt = $md[0]->kt;

        return response()->json(['cahaya'=>$cahaya,'ph'=>$ph,'suhu'=>$suhu,'kt'=>$kt,
            'cCahaya'=>$cCahaya,'cPh'=>$cPh,'cSuhu'=>$cSuhu,'cKt'=>$cKt
        ]);
        
    }
    
    public function getLaporanPerBulan($y,$m){
        
        $collection = DB::select('
            select day(tanggal) as day, avg(cahaya) as "cahaya",avg(suhu) as "suhu",avg(ph) as "ph",avg(kt) as "kt" from mediatanam
            group by tanggal
            having year(tanggal) = '.$y.' and month(tanggal) = '.$m.';        
        ');

        $cahaya = array();
        $suhu = array();
        $ph = array();
        $kt = array();

        foreach ($collection as $key) {
            array_push($cahaya,$key->cahaya);
            array_push($ph,$key->ph);
            array_push($suhu,$key->suhu);
            array_push($kt,$key->kt);
        }
  
        $view = view('laporanPerBulan',compact('collection'))->render();
        
        return response()->json(['html'=>$view,'cahaya'=>$cahaya,'ph'=>$ph,'suhu'=>$suhu,'kt'=>$kt]);

    }    
    
    public function printAnalisis($y,$m){
        
        $collection = DB::select('
            select day(tanggal) as day, avg(cahaya) as "cahaya",avg(suhu) as "suhu",avg(ph) as "ph",avg(kt) as "kt" from mediatanam
            group by tanggal
            having year(tanggal) = '.$y.' and month(tanggal) = '.$m.';        
        ');


        $arrayBulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','Oktober','November','Desember');
        $month = $arrayBulan[$m-1];

        // return view('analisisLaporan',compact('collection','y','month'));
        

        $pdf = PDF::loadView('analisisLaporan',compact('collection','y','month'));
        return $pdf->download('Bismillah Laporan '.$month.','.$y.'.pdf');

    }    
    


}
