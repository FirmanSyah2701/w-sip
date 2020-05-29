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
                        <form action="{{ route('ambilAntrianPost') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="hidden" name="nama_pasien" value="{{ Session::get('nama_pasien') }}">
                                <label for="">Kategori Konsultasi</label>
                                <select name="id_poli" class="form-control">
                                    <option value="" selected disabled>Pilih kategori</option>
                                    @foreach ($poli as $data)
                                        <option value="{{ $data->id_poli }}">{{ $data->nama_poli }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div style="margin-top:20px;"></div>
                                <button class="btn btn-primary" type="submit">Ok</button>
                                <a class="btn btn-danger" href="{{url('/')}}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop