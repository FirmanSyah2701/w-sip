@extends('pasien.template')

@section('title', 'Ambil antrian')
    
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
                    <li><a href="#">Daftar berobat</a></li>
                    <li class="active">Ambil antrian</li>
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
                        <strong class="card-title">Form Ambil Antrian</strong>
                    </div>
                    <div class="card-body">
                        <form id="frmAntrian" action="{{ route('antrianPost') }}" method="POST" role="form">
                            @csrf
                            <div class="col-md-12">
                                <label for="">Poli</label>
                                <select id="id_dokter" name="id_dokter" class="form-control">
                                    <option value="" selected disabled>Pilih poli dan dokter</option>
                                    @foreach ($dataDokter as $dokter)
                                        <option value="{{ $dokter->id_dokter }}">
                                            {{ $dokter->poli->nama_poli }} - {{ $dokter->nama_dokter }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div style="margin-top:20px;"></div>
                                <button class="btn btn-primary" name="pasien" type="submit">Ok</button>
                                <a class="btn btn-danger" href="{{ route('profilePasien') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop