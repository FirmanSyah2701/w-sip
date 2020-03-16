@extends('admin.template')

@section('title', 'Informasi')
    
@section('sidebar')
    @parent
@endsection

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<i class="mr-2 fa fa-align-justify"></i>
							<strong class="card-title" v-if="headerText">Informasi</strong>
						</div>
						<div class="card-body">
							<!-- BREADCRUMB-->
							<section class="au-breadcrumb m-t-3">
								<div class="section__content section__content--p30">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-12">
												<div class="au-breadcrumb-content">
													<div class="au-breadcrumb-left">
														<span class="au-breadcrumb-span">You are here:</span>
														<ul class="list-unstyled list-inline au-breadcrumb__list">
															<li class="list-inline-item active">
																<a href="#">Home</a>
															</li>
															<li class="list-inline-item seprate">
																<span>/</span>
															</li>
															<li class="list-inline-item">Konten / Informasi</li>
														</ul>
													</div>
													<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#largeModal">
														<i class="zmdi zmdi-plus"></i>add item</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<!-- END BREADCRUMB-->
							<div class="table-responsive table--no-card m-b-30">
								<table class="table table-borderless table-striped table-earning">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Penulis</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>2018-09-29 05:57</td>
                                            <td>100398</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Tambah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header">
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="row form-group">
							<div class="col-12 col-md-9">
								<input type="hidden" name="id_info" placeholder="Text" class="form-control">
								<input type="hidden" name="id_admin" placeholder="Text" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="email-input" class=" form-control-label">Judul</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="title" placeholder="Masukkan Judul" class="form-control">
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="textarea-input" class=" form-control-label">Deskripsi</label>
							</div>
							<div class="col-12 col-md-9">
								<textarea name="description" rows="7" placeholder="Masukkan deskripsi informasi" class="form-control"></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="file-input" class=" form-control-label">Foto informasi</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="file" id="file-input" name="photo" class="form-control-file">
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="file-input" class=" form-control-label">Tanggal</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="date" name="dateo" class="form-control">
							</div>
						</div>
					</form>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
@stop
