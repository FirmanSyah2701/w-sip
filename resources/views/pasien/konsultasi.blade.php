@extends('pasien.template')

@section('title', 'Konsultasi')
    
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
                    <li><a href="#">Konsultasi</a></li>
                    <li class="active">Konsultasi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if(session()->has('success'))
    <div class='container'>
        <div class='alert alert-success alert-dismissable'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                {{ session()->get('success') }}
        </div>
    </div>
@elseif($errors->any())
    <div class='container'>
        <div class="alert alert-danger alert-dismissable">
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach  
            </ul>
        </div>  
    </div>
    @endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Form Konsultasi</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('addKonsultasi')}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="hidden" name="id_pasien" value="{{ Session::get('id_pasien') }}">
                                <label for="">Kategori Konsultasi</label>
                                <select name="id_poli" class="form-control">
                                    <option value="" selected disabled>Pilih kategori</option>
                                    @foreach ($poli as $data)
                                        <option value="{{ $data->id_poli }}">{{ $data->nama_poli }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="" style="margin-top:7px;">Konsultasi</label>
                                <textarea class="form-control" name="konsul_pasien" placeholder="Isi konsultasi anda" rows="15"></textarea>
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