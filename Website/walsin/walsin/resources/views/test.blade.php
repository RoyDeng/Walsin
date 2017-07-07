@extends('layouts.master')

@section('title','檢驗狀況')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">檢驗單</h1>
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
										<th>驗收單編號</th>
										<th>料品編號</th>
										<th>料品名稱</th>
										<th>不良率</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($test as $t)
									<tr>
										<td>{{ $t->a_id }}</td>
										<td>{{ $t->i_id }}</td>
										<td>{{ $t->item->i_name }}</td>
										<td>{{ ($t->i_defect / $t->i_num)*100 }}%</td>
										<td>{{ $t->ac->a_time }}</td>
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
