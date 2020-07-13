@extends('pasien.template')

@section('title', 'Konsultasi')
    
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
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop