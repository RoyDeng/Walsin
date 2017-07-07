@extends('layouts.master')

@section('title','製程明細')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">製程明細</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-lg-4">
					<ul class="list-group">
						<li class="list-group-item">製程編號：{{ $mo->m_id }}</li>
						<li class="list-group-item">日期：{{ $mo->m_date }}</li>
						<li class="list-group-item">訂單編號：{{ $mo->o_id }}</li>
						<li class="list-group-item">客戶：{{ $orders->client->c_name }}</li>
						<li class="list-group-item">料品編號：{{ $orders->order_item->i_id }}</li>
						<li class="list-group-item">長度：{{ $orders->order_item->i_length }}m</li>
						<li class="list-group-item">直徑：{{ $orders->order_item->i_diam }}mm</li>
					</ul>
				</div>
				<div class="col-lg-4 text-center">
					<section class="panel">
						<div class="panel-body">
							<h1>達成率</h1>
							<span class="easypiechart1 easypiechart" data-percent="{{ ($orders->ps_item->o_reach)*100 }}"><span class="percent"></span></span>
						</div>
					</section>
				</div>
				<div class="col-lg-4 text-center">
					<section class="panel">
						<div class="panel-body">
							<h1>不良率</h1>
							<span class="easypiechart1 easypiechart" data-percent="{{ ($orders->ps_item->o_defect)*100 }}"><span class="percent"></span></span>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="col-xs-12 bg-white">
			<table class="table">
				<thead>
					<tr>
						<th>製程明細編號</th>
						<th>工作站編號</th>
						<th>狀態</th>
						<th>經站時間</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mo_item as $m)
					<tr>
						<th scope="row">{{ $m->mo_id }}</th>
						<td>{{ $m->w_id }}</td>
						<td>
							@if($m->m_status == 0)
							<span class="label label-danger">未經站</span>
							@elseif($m->m_status == 1)
							<span class="label label-success">已經站</span>
							@else
							<span class="label label-warning">設備異常</span>
							@endif
						</td>
						<td>{{ $m->m_time }}</td>						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
</section>
@stop