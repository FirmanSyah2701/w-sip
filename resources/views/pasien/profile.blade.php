@extends('pasien.template')

@section('title', 'Profile')
    
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
                    <li><a href="#">Profile</a></li>
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
                        <strong class="card-title">Profile</strong>
                    </div>
                    <div class="card-body">
                        <p style="font-weight:bold">Username: {{ $pasien[0]->username }}</p>
                        <p style="font-weight:bold">Nama: {{ $pasien[0]->nama_pasien }}</p>
                        <p style="font-weight:bold">Alamat: {{ $pasien[0]->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop