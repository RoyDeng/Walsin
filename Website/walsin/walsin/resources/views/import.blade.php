@extends('layouts.master')

@section('title','進貨單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">進貨單</h1>
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
										<th>進貨單編號</th>
										<th>訂單編號</th>
										<th>料品編號</th>
										<th>狀態</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($import as $im)
									@if($im->stock->s_type == 2)
									<tr>
										<td>{{ $im->s_id }}</td>
										<td>{{ $im->order_item->o_id }}</td>
										<td>{{ $im->i_id }}</td>
										<td>
											@if($im->i_status == 0)
											<span class="label label-danger">未進貨</span>
											@else
											<span class="label label-success">已進貨</span>
											@endif
										</td>
										<td>{{ $im->stock->s_date }}</td>
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