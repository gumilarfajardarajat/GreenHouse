@extends('layouts.app')

@section('content')
<div class="container mt-5" style=" width:100%;">
    <div class="card-deck m-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Intensitas Cahaya</h4>
                <h1 class="card-text d-flex justify-content-center" style="font-size:12vh;"><span id="cCahaya"></span></h1>
                <div class="btn-container w-100 d-flex justify-content-center">
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#intensitas_cahaya">Detail</button>
                </div>
            </div> 
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Suhu</h4>
                <h1 class="card-text d-flex justify-content-center" style="font-size:12vh;"><span id="cSuhu"></span></h1>
                <div class="btn-container w-100 d-flex justify-content-center">
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#suhu">Detail</button>
                </div>                
            </div> 
        </div>              
    </div>

    <div class="card-deck m-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">PH</h4>
                <h1 class="card-text d-flex justify-content-center" style="font-size:12vh;"><span id="cPh"></span></h1>
                <div class="btn-container w-100 d-flex justify-content-center">
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ph">Detail</button>
                </div>
            </div> 
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Kelembaban Tanah</h4>
                <h1 class="card-text d-flex justify-content-center" style="font-size:12vh;"><span id="cKt"></span></h1>
                <div class="btn-container w-100 d-flex justify-content-center">
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#kt">Detail</button>
                </div>
            </div> 
        </div>              
    </div>    
    
    {{-- <div class="card-deck m-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Jumlah Tanaman</h4>
                <h1 class="card-text d-flex justify-content-center"><span style="font-size:15vh">{{$proses}}</span></h1>
                <a href="{{route('index_cahaya')}}" class="btn d-flex justify-content-center btn-ct">Detail</a>                
            </div> 
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Jumlah Panen</h4>
                <h1 class="card-text d-flex justify-content-center"><span style="font-size:15vh">{{$panen}}</span></h1>
                <a href="{{route('index_cahaya')}}" class="btn d-flex justify-content-center btn-ct">Detail</a>
            </div> 
        </div>           
    </div>  --}}

    <div class="card-deck m-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Paranet</h4>
                <div class="card-text d-flex justify-content-center">
                    <div class="checkbox  col-lg-12">
                        <div class="row d-flex justify-content-around">
                            <span class="btn btn-default disabled font-weight-bold">Manual</span>
                            <input type="checkbox" class="switch_1 pull-right" id="paranet" onclick="paranet()">            
                        </div>   
                        <div class="row d-flex justify-content-around">
                            <span class="btn btn-default disabled font-weight-bold">Otomatis</span>
                            <input type="checkbox" class="switch_1 pull-right" id="auto-paranet" onclick="otParanet()">            
                        </div>                                               
                    </div>
                </div> 
            </div> 
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Penyiraman</h4>
                <div class="card-text d-flex justify-content-center">
                    <div class="checkbox  col-lg-12">
                        <div class="row d-flex justify-content-around">
                            <span class="btn btn-default disabled font-weight-bold">Manual</span>
                            <input type="checkbox" class="switch_1 pull-right" id="penyiraman" onclick="penyiraman()">            
                        </div>   
                        <div class="row d-flex justify-content-around">
                            <span class="btn btn-default disabled font-weight-bold">Otomatis</span>
                            <input type="checkbox" class="switch_1 pull-right" id="auto-penyiraman" onclick="otPenyiraman()">            
                        </div>                                               
                    </div>
                </div> 
            </div> 
        </div>                        
    </div>     
</div>
<div class="modal fade" id="intensitas_cahaya" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <li class="list-group-item">
                <h2 class="text-center">{{date('l, d-m-Y')}}</h2>
            </li>
            <li class="list-group-item">
                <canvas id="cahayaChart"></canvas>
            </li>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Jam</th>
                    <th scope="col" class="text-center">Intensitas Cahaya</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($collection as $item)
                <tr>
                    <th scope="row" class="text-center">{{$item->jam}}</th>
                    <td class="text-center">{{$item->cahaya}}</td>            
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="modal fade" id="suhu" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <li class="list-group-item">
                <h2 class="text-center">{{date('l, d-m-Y')}}</h2>
            </li>
            <li class="list-group-item">
                <canvas id="suhuChart"></canvas>
            </li>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Jam</th>
                    <th scope="col" class="text-center">Suhu</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($collection as $item)
                <tr>
                    <th scope="row" class="text-center">{{$item->jam}}</th>
                    <td class="text-center">{{$item->suhu}}</td>            
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="modal fade" id="ph" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <li class="list-group-item">
                <h2 class="text-center">{{date('l, d-m-Y')}}</h2>
            </li>
            <li class="list-group-item">
                <canvas id="phChart"></canvas>
            </li>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Jam</th>
                    <th scope="col" class="text-center">PH</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($collection as $item)
                <tr>
                    <th scope="row" class="text-center">{{$item->jam}}</th>
                    <td class="text-center">{{$item->ph}}</td>            
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="modal fade" id="kt" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <li class="list-group-item">
                <h2 class="text-center">{{date('l, d-m-Y')}}</h2>
            </li>
            <li class="list-group-item">
                <canvas id="ktChart"></canvas>
            </li>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Jam</th>
                    <th scope="col" class="text-center">Kelembaban Tanah</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($collection as $item)
                <tr>
                    <th scope="row" class="text-center">{{$item->jam}}</th>
                    <td class="text-center">{{$item->kt}}</td>            
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
