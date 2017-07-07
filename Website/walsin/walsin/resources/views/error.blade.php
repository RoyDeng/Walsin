@extends('layouts.master')

@section('title','錯誤處理')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">錯誤處理</h1>
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
										<th>錯誤編號</th>
										<th>訂單編號</th>
										<th>狀態</th>
										<th>時間</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($error as $e)
									<tr>
										<td>{{ $e->r_id }}</td>
										<td>{{ $e->o_id }}</td>
										<td>
										@if($e->r_status==0)
											<span class="label label-danger">未解決</span>
										@else
											<span class="label label-success">已解決</span>
										@endif
										</td>
										<td>{{ $e->r_time }}</td>
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