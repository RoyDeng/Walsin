@extends('layouts.master')

@section('title','搜尋工作站')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">搜尋工作站</h1>
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
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>工作站編號</th>
										<th>狀態</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									@foreach($search as $s)
									<tr>
										<td>{{ $s->w_id }}</td>
										<td>
											@if($s->s_status == 0)
											<span class="label label-success">溫度正常</span>
											@elseif($s->s_status == 1)
											<span class="label label-info">溫度過低</span>
											@else
											<span class="label label-danger">溫度過高</span>
											@endif
										</td>
										<td><a href="editparm/{{ $s->w_id }}">修改製造參數</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="pull-right">
							@if(isset($keyword))
								{{ $search->appends(['keyword' => $keyword])->render() }}
							@else
								{{ $search->render() }}
							@endif
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
</section>
@stop