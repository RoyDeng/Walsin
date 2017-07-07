@extends('layouts.master')

@section('title','出貨單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">出貨單</h1>
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
										<th>出貨單編號</th>
										<th>訂單編號</th>
										<th>料品編號</th>
										<th>數量</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($export as $e)
									@if($e->stock->s_type==6)
									<tr>
										<td>{{ $e->s_id }}</td>
										<td>{{ $e->order_item->o_id }}</td>
										<td>{{ $e->i_id }}</td>
										<td>{{ $e->order_item->i_num }}</td>
										<td>{{ $e->stock->s_date }}</td>
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
