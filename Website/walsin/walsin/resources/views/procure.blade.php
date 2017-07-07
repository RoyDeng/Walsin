@extends('layouts.master')

@section('title','採購單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">採購單</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12">
			<section class="box ">
				<header class="panel_header">
				</header>
				<div class="content-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="example-1" class="table table-striped dt-responsive display">
								<thead>
									<tr>
										<th>採購單編號</th>
										<th>料品編號</th>
										<th>BOM編號</th>
										<th>數量</th>
										<th>狀態</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($procure as $p)
									<tr>
										<td>{{ $p->p_id }}</td>
										<td>{{ $p->bo->i_id }}</td>
                                        <td>{{ $p->bo->b_id }}</td>
										<td>{{ $p->i_num }}</td>
										<td>
											@if($p->i_status == 0)
											<span class="label label-danger">未採購</span>
											@else
											<span class="label label-success">已採購</span>
											@endif
										</td>
										<td>{{ $p->po->p_date }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
</section>
@stop
