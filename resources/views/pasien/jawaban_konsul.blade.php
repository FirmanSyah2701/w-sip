@extends('pasien.template')

@section('title', 'Jawaban Konsultasi')
    
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
                        <strong class="card-title">Jawaban Konsultasi</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-hover table-bordered">
                            <thead class="thead-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama Dokter</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($konsul as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->poli->nama_poli }}</td>
                                    <td>{{ $data->dokter->nama_dokter }}</td>
                                    <td>{{ $data->konsul_pasien }}</td>
                                    <td>{{ $data->jawaban_dokter }}</td>
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