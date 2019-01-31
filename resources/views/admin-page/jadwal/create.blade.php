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
                                <select class="form-control" id="sel1">
                                    <option disabled selected>Pilih Tanaman</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <select class="form-control" id="sel1">
                                    <option disabled selected>Pilih Kelompok</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Tanggal Masuk :</label>
                                <input type="date" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Tanggal Keluar :</label>
                                <input type="date" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt">
                                <label for="email">Status :</label>
                            </div>
                            <div class="col-md-12 mt">
                                <label class="radio">
                                    <input type="radio" name="optradio" checked>Option 1
                                </label>
                                <label class="radio">
                                    <input type="radio" name="optradio">Option 2
                                </label>
                                <label class="radio">
                                    <input type="radio" name="optradio">Option 3
                                </label>
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