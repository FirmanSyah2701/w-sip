@extends('pasien.template')

@section('title', 'Konsultasi')
    
@section('sidebar')
    @parent
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Konsultasi</a></li>
                    <li class="active">Konsultasi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Form Konsultasi</strong>
                    </div>
                    <div class="card-body">
                        <form id="frmConsult" action="{{route('addKonsultasi')}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="">Poli</label>
                                <select name="id_dokter" class="form-control">
                                    <option value="" selected disabled>Pilih Poli dan Dokter</option>
                                    @foreach ($dokter as $data)
                                        <option value="{{ $data->id_dokter }}">
                                            {{ $data->nama_dokter }} - {{ $data->poli->nama_poli }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="" style="margin-top:7px;">Konsultasi</label>
                                <textarea class="form-control" name="konsul_pasien" 
                                    placeholder="Isi konsultasi anda" rows="15"></textarea>
                            </div>

                            <div class="col-md-12">
                                <div style="margin-top:20px;"></div>
                                <button class="btn btn-primary" type="submit">Ok</button>
                                <a class="btn btn-danger" href="{{route('profilePasien')}}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop