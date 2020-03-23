@extends('admin.template')

@section('title', 'Daftar Dokter')
    
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
                    <li><a href="#">Konten</a></li>
                    <li class="active">Galeri</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach  
                        </ul>  
                    </div> 
                    @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Dokter</strong>
                        <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#myModal" 
                            title="Tambah Data Gallery"><i class="fa fa-plus"></i></button>    
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-hover table-bordered">
                            <thead class="thead-primary">
                                <tr>
                                    <th>No</th>
                                    <th>NIP / NIK</th>
                                    <th>Nama Dokter</th>
                                    <th>Spesialis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctor as $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->doctor_id }}</td>
                                    <td>{{ $row->doctor_name }}</td>
                                    <td>{{ $row->specialist }}</td>
                                    <td>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
                                                data-target="#edit-data{{$row->doctor_id}}" ><i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div class="col-sm-2">    
                                            <form action="{{route('doctor.destroy', $row->doctor_id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </form>
                                        </div>
                                    </td>
                                </tr> 
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal Tambah -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('doctor.store')}}" class="form-horizontal tasi-form" method="post">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NIP/NIK</label>
                    <div class="col-sm-8">        
                        <input type="text" name="doctor_id" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Dokter</label>
                    <div class="col-sm-8">
                        <input type="text" name="doctor_name" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Spesialis</label>
                    <div class="col-sm-8">
                        <input type="text" name="specialist" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
            </div>        
        </div>
    </div>
</div>

@foreach ($doctor as $row)
<!-- Modal Ubah Data  -->
<div id="edit-data{{$row->doctor_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('doctor.update', $row->doctor_id)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Dokter</label>
                    <div class="col-sm-8">
                        <input type="text" name="doctor_name" class="form-control" value="{{ $row->doctor_name }}">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Spesialis</label>
                    <div class="col-sm-8">
                        <input type="text" name="specialist" class="form-control" value="{{ $row->specialist }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@stop