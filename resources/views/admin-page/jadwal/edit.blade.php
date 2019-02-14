@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">         
            <li class="list-group-item">
                <span class="btn btn-default" onclick="showMenu(0)">Edit Profil <i class="fas fa-chevron-down"></i></span>
            </li>
            <li class="list-group-item show-menu">
                <form method="POST" action="{{ route('update_jadwal',$data->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $data->id }}" required autofocus readonly>

                            @if ($errors->has('id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>                                  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $data->nama }}" required autofocus>

                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kelompok') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" id="sel1" name="kelompok">
                                @foreach ($kelompok as $item)
                                    @if ($data->tanaman == $item->id)
                                        <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('keterangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tanaman') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" id="sel1" name="tanaman">
                                @foreach ($tanaman as $item)
                                    @if ($data->tanaman == $item->id)
                                        <option value="{{$item->id}}" checked>{{$item->nama}}</option>
                                    @else
                                        <option value="{{$item->id}}" checked>{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('keterangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Masuk') }}</label>

                        <div class="col-md-6">
                            <input type="date" class="form-control" id="email" placeholder="Enter email" name="tgl_masuk" value="{{ $data->tgl_masuk }}">

                            @if ($errors->has('keterangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Keluar') }}</label>

                        <div class="col-md-6">
                            <input type="date" class="form-control" id="email" placeholder="Enter email" name="tgl_keluar" value="{{ $data->tgl_keluar }}">

                            @if ($errors->has('keterangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Tanaman') }}</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" id="email" placeholder="Jumlah Tanaman" name="jumlah_tanaman" value="{{ $data->jumlah_tanaman }}">

                            @if ($errors->has('keterangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <label class="radio">
                                @if ($data->status == 'planning')
                                    <input type="radio" name="status" value="planning" checked> Planning
                                @else
                                    <input type="radio" name="status" value="planning"> Planning
                                @endif
                                
                            </label>
                            
                            <label class="radio ml-3">
                                @if ($data->status == 'progress')
                                    <input type="radio" name="status" value="progress" checked> Progress
                                @else 
                                    <input type="radio" name="status" value="progress"> Progress
                                @endif
                            </label>


                            <label class="radio ml-3">
                                @if ($data->status == 'done')
                                    <input type="radio" name="status" value="done" checked> Done
                                @else
                                    <input type="radio" name="status" value="done"> Done
                                @endif
                            </label>
                        </div>
                    </div>  


                                      
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </div>
                </form>
            </li>
            <li class="list-group-item">
                <span class="btn btn-link" data-toggle="modal" data-target="#myModal">Hapus Jadwal</span>
            </li>                                                      

        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus</h4>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{route('destroy_jadwal',$data->id)}}" class="form-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2">Hapus</button>
                </form>
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
            </div>
        
        </div>
    </div>
</div>

@endsection