@extends('layouts.master')

@section('title','修改製造參數')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">修改製造參數</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel_header">
							<h2 class="title pull-left">工作中心編號：{{ $station->w_id }}</h2>
						</header>
						<div class="panel-body">
							<form method="post" action="/addparm/{{ $station->w_id }}">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label" for="field-1">最高溫</label>
									<input class="form-control m-bot15" name="s_max_temp" value="{{ $station->s_max_temp }}" />
								</div>
								<div class="form-group">
									<label class="form-label" for="field-1">最低溫</label>
									<input class="form-control m-bot15" name="s_min_temp" value="{{ $station->s_min_temp }}" />
								</div>
								<div class="pull-right">
									<button type="submit" class="btn btn-primary pull-right">修改</button>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
</section>
@stop