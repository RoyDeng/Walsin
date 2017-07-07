@extends('layouts.master')

@section('title','製程監控')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">製程監控</h1>
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
										<th>達成率</th>
										<th>日期</th>
									</tr>
								</thead>
								<tbody align="center">
									@foreach($mo as $m)
									@if($m->order->o_status!=0)
									<tr>
										<td><a href="mo_details/{{ $m->o_id }}">{{ $m->o_id }}</a></td>
										<td>{{ $m->order->c_id }}</td>
										<td>{{ $m->order_item->i_id }}</td>
										<td>{{ ($m->ps->o_reach)*100 }}%</td>
										<td>{{ $m->m_date }}</td>
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