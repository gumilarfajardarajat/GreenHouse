@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card p-5 shadow">
                <div class="card-body d-flex justify-content-center">
                    <h2>Tambah Data Jadwal</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_jadwal') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus placeholder="Nama">

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="keterangan" value="{{ old('nama') }}" required autofocus placeholder="Keterangan">

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <label for="email">Tanaman :</label>
                                <select class="form-control" id="sel1" name="tanaman">
                                    @foreach ($tanaman as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <label for="email">Kelompok :</label>
                                <select class="form-control" id="sel1" name="kelompok">
                                    @foreach ($kelompok as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Tanggal Masuk :</label>
                                <input type="date" class="form-control" id="email" placeholder="Enter email" name="tgl_masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Tanggal Keluar :</label>
                                <input type="date" class="form-control" id="email" placeholder="Enter email" name="tgl_keluar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Status :</label>
                            </div>
                            <div class="col-md-12 mt">
                                <label class="radio">
                                    <input type="radio" name="status" value="planning" checked> Planning
                                </label>
                                <label class="radio ml-3">
                                    <input type="radio" name="status" value="progres"> Progress
                                </label>
                                <label class="radio ml-3">
                                    <input type="radio" name="status" value="done"> Done
                                </label>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="jumlah_tanaman" required autofocus placeholder="Jumlah Tanaman" min="0">

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                                                                                                                                                                                          
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12 font-weight-bold mt-3">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection