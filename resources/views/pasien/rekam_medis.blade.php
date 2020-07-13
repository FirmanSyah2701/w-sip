@extends('pasien.template')

@section('title', 'Rekam Medis')
    
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
                                    <td> @date($data->tanggal_berobat) </td>
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