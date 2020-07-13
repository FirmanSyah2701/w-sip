@extends('pasien.template')

@section('title', 'Lihat antrian')
    
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
                        <strong class="card-title">Lihat No Urut Antrian</strong>
                    </div>
                    <div class="card-body">
                        <p style="font-weight:bold">Nama: {{ $antrian->nama_pasien }}</p>
                        <p style="font-weight:bold">Nomer Urut Antrian: 
                            {{ $antrian->no_antrian ? $antrian->no_antrian : "Tunggu konfirmasi"  }} 
                        </p>
                        <p style="font-weight:bold">Poli: {{ $antrian->poli->nama_poli }}</p>
                        <p style="font-weight:bold">Dokter: {{ $antrian->dokter->nama_dokter }}</p>
                        <p style="font-weight:bold">Tanggal: @date($antrian->tanggal)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop