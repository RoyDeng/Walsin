@extends('layouts.master')

@section('title','庫存狀況')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">庫存狀況</h1>
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
										<th>庫存單編號</th>
										<th>料品編號</th>
										<th>倉庫編號</th>
										<th>儲位編號</th>
										<th>數量</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($stock as $st)
									@if($st->stock->s_type==1)
									<tr>
										<td>{{ $st->s_id }}</td>
										<td>{{ $st->i_id }}</td>
										<td>{{ $st->place_item->h_id }}</td>
										<td>{{ $st->place_item->pa_id }}</td>
										<td>{{ $st->i_num }}</td>
										<td>{{ $st->stock->s_date }}</td>
									</tr>
									@endif
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
