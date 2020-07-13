@extends('pasien.template')

@section('title', 'Profile')
    
@section('sidebar')
    @parent
@endsection

@section('content')

    @if(session()->has('success'))
        <div class='container'>
            <div class='alert alert-success alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                    {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Profile</strong>
                            <button type="button" class="btn btn-primary pull-right btn-sm" 
                                data-toggle="modal" data-target="#edit-data{{ $pasien->id_pasien }}" 
                                title="Edit Profile">
                                Ubah Akun
                            </button>
                        </div>
                        <div class="card-body">
                            @if($pasien->foto != '')
                                <img class="mx-auto d-block rounded-circle img-responsive" 
                                    width="260px" height="200px" 
                                    src="{{URL::to('/')}}/assets/img/product/{{ $pasien->foto }}">
                            @endif
                            <div style="margin-top: 40px;"></div>
                            <div class="text-center"> Username: {{ $pasien->username }} </div>
                            <div class="text-center"> Nama Lengkap: {{ $pasien->nama_pasien }} </div>
                            <div class="text-center"> Jenis Kelamin: {{ $pasien->jk }} </div>
                            <div class="text-center"> Umur: {{ $pasien->umur }} </div>
                            <div class="text-center"> Nomer Telpon: {{ $pasien->no_telp }} </div>
                            <div class="text-center"> Alamat: {{ $pasien->alamat }} </div>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Data  -->
    <div id="edit-data{{$pasien->id_pasien}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Ubah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <form action="{{route('editProfile', $pasien->id_pasien)}}" method="POST"
                        enctype="multipart/form-data" class="form-horizontal tasi-form">

                        @csrf
                        @method('PUT')
                        
                        @if($pasien->foto != '')
                            <img class="mx-auto d-block img-responsive rounded-circle" 
                                width="260px" height="200px" 
                                src="{{URL::to('/')}}/assets/img/product/{{ $pasien->foto }}">
                        @endif

                        <div style="margin-top: 40px;"></div>
                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="username" value="{{ $pasien->username }}">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Nama lengkap</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="nama_pasien" value="{{ $pasien->nama_pasien }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Umur</label>
                            <div class="col-sm-8">                    
                                <input type="number" class="form-control" 
                                    name="umur" value="{{ $pasien->umur }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Nomer Telpon</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="no_telp" value="{{ $pasien->no_telp }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">                    
                                <textarea class="form-control" name="alamat">{{ $pasien->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-8">                    
                                <input type="file" class="form-control" name="foto">
                                <small class="form-text text-muted">JPG|JPEG|PNG Max 2MB</small>
                                <input type="hidden" name="hidden_foto" value="{{ $pasien->photo }}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Batal
                            </button>
                        </div>             
                    </form>
                </div>        
            </div>
        </div>
    </div>
@stop