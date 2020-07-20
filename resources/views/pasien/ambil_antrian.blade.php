@extends('pasien.template')

@section('title', 'Ambil antrian')
    
@section('sidebar')
    @parent
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Form Pesan Antrian</strong>
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
                            <div class="col-md-4">
                                <label style="margin-top: 10px;">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" 
                                    class="form-control" min="{{ $now }}">
                            </div>

                            <div class="col-md-12">
                                <div style="margin-top:20px;"></div>
                                <button class="btn btn-primary" name="pasien" type="submit">
                                    Pesan sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop