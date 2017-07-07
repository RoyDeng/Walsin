@extends('layouts.master')

@section('title','首頁')

@section('content')
<section id="main-content">
	<section class="wrapper main-wrapper row">
		<div class="col-xs-12">
			<div class="page-title">
				<div class="pull-left">
					<h1 class="title">首頁</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12">
			<section class="box nobox marginBottom0">
				<div class="content-body">
					<div class="row">
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left fa fa-file-text icon-md icon-rounded icon-red"></i>
								<div class="stats">
									<h4><strong>{{ $o_num }}</strong></h4>
									<span>訂單</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left fa fa-cubes icon-md icon-rounded icon-primary"></i>
								<div class="stats">
									<h4><strong>{{ $i_num }}</strong></h4>
									<span>料品</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left fa fa-industry icon-md icon-rounded icon-green"></i>
								<div class="stats">
									<h4><strong>{{ $w_num }}</strong></h4>
									<span>工作中心</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="r4_counter db_box">
								<i class="pull-left fa fa-users icon-md icon-rounded icon-blue"></i>
								<div class="stats">
									<h4><strong>{{ $u_num }}</strong></h4>
									<span>員工</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-xs-12 col-sm-9">
				<figure>
					<div id="db-world-map-markers" style="width: 100%; height: 300px"></div>        
				</figure>
			</div>
			<div class="col-xs-12 col-sm-3">
				<div class="r3_weather">
					<div class="wid-weather wid-weather-small">
						<div>
							<div class="location">
								<h3>台南市</h3>
								<span>{{ $weather[0]["date"] }}</span>
								<img src="{{ $weather[0]['img'] }}" title="{{ $weather[0]['title'] }}">
							</div>
							<div class="clearfix"></div>
							<div class="degree">
								<h3>{{ $weather[0]["temperature"] }}°C</h3>
							</div>
							<div class="clearfix"></div>
							<div class="weekdays bg-white">
								<ul class="list-unstyled">
									<li><span class="day">{{ $weather[1]["date"] }}</span><img src="{{ $weather[1]['img'] }}" title="{{ $weather[1]['title'] }}"><span class="temp">{{ $weather[1]["temperature"] }}°C</span></li>
									<li><span class="day">{{ $weather[2]["date"] }}</span><img src="{{ $weather[2]['img'] }}" title="{{ $weather[2]['title'] }}"><span class="temp">{{ $weather[2]["temperature"] }}°C</span></li>
									<li><span class="day">{{ $weather[3]["date"] }}</span><img src="{{ $weather[3]['img'] }}" title="{{ $weather[3]['title'] }}"><span class="temp">{{ $weather[3]["temperature"] }}°C</span></li>
									<li><span class="day">{{ $weather[4]["date"] }}</span><img src="{{ $weather[4]['img'] }}" title="{{ $weather[4]['title'] }}"><span class="temp">{{ $weather[4]["temperature"] }}°C</span></li>
									<li><span class="day">{{ $weather[5]["date"] }}</span><img src="{{ $weather[5]['img'] }}" title="{{ $weather[5]['title'] }}"><span class="temp">{{ $weather[5]["temperature"] }}°C</span></li>
									<li><span class="day">{{ $weather[6]["date"] }}</span><img src="{{ $weather[6]['img'] }}" title="{{ $weather[6]['title'] }}"><span class="temp">{{ $weather[6]["temperature"] }}°C</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
@stop