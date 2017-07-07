@extends('layouts.master')

@section('title','新增製程')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">新增製程</h1>
				</div>
				<div class="pull-right hidden-xs">
					<button type="button" onclick="location.href='/update/{{ $mo->o_id }}';" class="btn btn-primary">確定製程</button>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-lg-4">
					<ul class="list-group">
						<li class="list-group-item">製程編號：{{ $mo->m_id }}</li>
						<li class="list-group-item">訂單編號：{{ $mo->o_id }}</li>
						<li class="list-group-item">日期：{{ $orders->o_date }}</li>
						<li class="list-group-item">客戶：{{ $orders->client->c_name }}</li>
						<li class="list-group-item">料品編號：{{ $orders->order_item->i_id }}</li>
					</ul>
				</div>
				<div class="col-lg-8">
					<section class="panel">
						<header class="panel_header">
							<h2 class="title pull-left">請依序新增製程明細</h2>
						</header>
						<div class="panel-body">
							<form method="post" action="/add/{{ $mo->o_id }}">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label" for="field-1">工作站</label>
									<select class="form-control m-bot15" name="w_id">
										<option selected>請選擇</option>
										@foreach($workstation as $w)
										<option value="{{ $w->w_id }}">{{ $w->w_id }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="field-1">操作員</label>
									<select class="form-control m-bot15" name="id">
										<option selected>請選擇</option>
										@foreach($user as $u)
										<option value="{{ $u->id }}">{{ $u->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="pull-right">
									<button type="submit" class="btn btn-primary pull-right">新增</button>
								</div>
							</form>
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
						<th>員工編號</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mo_item as $m)
					<tr>
						<th scope="row">{{ $m->mo_id }}</th>
						<td>{{ $m->w_id }}</td>
						<td>{{ $m->id }}</td>
						<td>
							<button type="button" onclick="location.href='/remove/{{ $m->mo_id }}';" class="btn btn-primary">刪除</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
</section>
@stop