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
                        Anda Belum Memesan Antrian
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop