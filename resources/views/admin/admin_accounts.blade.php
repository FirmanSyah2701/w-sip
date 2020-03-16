@extends('admin.template')

@section('title', 'Akun Admin')
    
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
							<strong class="card-title" v-if="headerText">Akun Admin</strong>
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
															<li class="list-inline-item">Akun/Admin</li>
														</ul>
													</div>
													<button class="au-btn au-btn-icon au-btn--green au-btn--small">
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
											<th>username</th>
											<th>password</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>2018-09-29 05:57</td>
											<td>100398</td>
										</tr>
										<tr>
											<td>2</td>
											<td>2018-09-28 01:22</td>
											<td>100397</td>
										</tr>
										<tr>
											<td>3</td>
											<td>2018-09-27 02:12</td>
											<td>100396</td>
										</tr>
										<tr>
											<td>4</td>
											<td>2018-09-26 23:06</td>
											<td>100395</td>
										</tr>
										<tr>
											<td>5</td>
											<td>2018-09-25 19:03</td>
											<td>100393</td>
										</tr>
										<tr>
											<td>6</td>
											<td>2018-09-29 05:57</td>
											<td>100392</td>
										</tr>
										<tr>
											<td>7</td>
											<td>2018-09-24 19:10</td>
											<td>100391</td>
										</tr>
										<tr>
											<td>8</td>
											<td>2018-09-22 00:43</td>
											<td>100393</td>
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
@stop
