@extends('layouts.master')

@section('title','訂單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">訂單</h1>
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
										<th>客戶編號</th>
										<th>料品編號</th>
										<th>日期</th>
										<th>狀態</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($order as $o)
									<tr>
										<td>{{ $o->o_id }}</td>
										<td>{{ $o->c_id }}</td>
										<td>{{ $o->order_item->i_id }}</td>
										<td>{{ $o->o_date }}</td>
										<td>
											@if($o->o_status == 0)
											<span class="label label-danger">未排程</span>
											@else
											<span class="label label-success">已排程</span>
											@endif
										</td>
										<td>
											@if($o->o_status == 0)
											<a href="edit/{{ $o->o_id }}">新增排程</a>
											@endif
										</td>
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