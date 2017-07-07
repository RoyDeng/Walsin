@extends('layouts.master')

@section('title','領料單')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">領料單</h1>
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
										<th>領料單編號</th>
										<th>料品編號</th>
										<th>數量</th>
										<th>狀態</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($pick as $pi)
									@if($pi->stock->s_type==4)
									<tr>
										<td>{{ $pi->s_id }}</td>
										<td>{{ $pi->i_id }}</td>
										<td>{{ $pi->i_num }}</td>
										<td>
											@if($pi->i_status == 0)
											<span class="label label-danger">未領料</span>
											@else
											<span class="label label-success">已領料</span>
											@endif
										</td>
										<td>{{ $pi->stock->s_date }}</td>
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
