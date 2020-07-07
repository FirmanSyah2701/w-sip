@extends('pasien.template')

@section('title', 'Rekam Medis')
    
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
                    <li><a href="#">Rekam Medis</a></li>
                    <li class="active">Rekam Medis</li>
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
                        <strong class="card-title">Rekam Medis</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-hover table-bordered">
                            <thead class="thead-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Poli</th>
                                    <th>Nama Dokter</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rMedis as $data)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $data->poli->nama_poli }} </td>
                                    <td> {{ $data->dokter->nama_dokter }} </td>
                                    <td> {{ $data->keterangan }} </td>
                                    <td> {{ $data->tanggal_berobat }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop