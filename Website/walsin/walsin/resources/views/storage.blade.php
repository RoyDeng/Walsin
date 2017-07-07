@extends('layouts.master')

@section('title','入庫單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">入庫單</h1>
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
										<th>訂單編號</th>
										<th>料品編號</th>
										<th>倉庫編號</th>
										<th>儲位編號</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($storage as $s)
									@if($s->stock->s_type==5)
									<tr>
										<td>{{ $s->order_item->o_id }}</td>
										<td>{{ $s->i_id }}</td>
										<td>{{ $s->place_item->h_id }}</td>
										<td>{{ $s->place_item->pa_id }}</td>
										<td>{{ $s->stock->s_date }}</td>
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
