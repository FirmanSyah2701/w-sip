@extends('admin.template')

@section('title', 'Dashboard')
    
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
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Hello</span> Admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">                        
                <h4 class="mb-0">
                    <span class="count">0</span>
                </h4>
                <p class="text-light">Data Informasi</p>

                <div style="height:70px;" height="70">
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">                        
                <h4 class="mb-0">
                    <span class="count">0</span>
                </h4>
                <p class="text-light">Data Galeri</p>

                <div style="height:70px;" height="70">
                <a href="#" class="btn btn-info">Detail</a>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">0</span>
                </h4>
                <p class="text-light">Data Perlombaan</p>

                <div class="" style="height:70px;" height="70">
                <a href="#" class="btn btn-success">Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">                        
                <h4 class="mb-0">
                    <span class="count">0</span>
                </h4>
                <p class="text-light">Data Calon Pengurus</p>

                <div style="height:70px;" height="70">
                <a href="#" class="btn btn-danger">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .content -->
@stop