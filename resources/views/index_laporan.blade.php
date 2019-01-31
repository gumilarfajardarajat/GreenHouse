@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5">
    <h1>Analisis</h1>
    <div class="form-inline">
      <div class="form-group">
        <label for="tanggal" class="pr-5">Tanggal : </label>
        <select class="form-control" id="tanggal" onchange="getLaporanPerbulan()">
          @foreach ($collection as $idx => $item)
            @if ($idx>0)
              <option value="{{$item->tanggal}}">{{date("d-F-Y", strtotime($item->tanggal))}}</option>  
            @else
              <option value="{{$item->tanggal}}" selected>{{date("d-F-Y", strtotime($item->tanggal))}}</option>  
            @endif
          @endforeach            
        </select>
      </div>
    </div>
    <div id="target">
    </div>
</div>
@endsection