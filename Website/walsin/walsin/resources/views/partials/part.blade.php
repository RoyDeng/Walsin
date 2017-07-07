<div class="page-sidebar fixedscroll">
	<div class="page-sidebar-wrapper" id="main-menu-wrapper">
		<div class="profile-info row">
			<div class="profile-image col-xs-4">
				<img alt="" src="{{ asset('assets/images/profile.jpg') }}" class="img-responsive img-circle">
			</div>
			<div class="profile-details col-xs-8">
				<h3>
					{{ Auth::user()->name }}
					<span class="profile-status online"></span>
				</h3>
				<p class="profile-title">{{ Auth::user()->email }}</p>
			</div>
		</div>
		<ul class="wraplist">
			@if(isset($weather))
			<li class="open">
			@else
			<li>
			@endif 
				<a href="{{ url('/') }}">
					<i class="fa fa-dashboard"></i>
					<span class="title">首頁</span>
				</a>
			</li>
			@if(isset($mo) || isset($error) || isset($order))
			<li class="open">
			@else
			<li>
			@endif 
				<a href="javascript:;">
					<i class="fa fa-industry"></i>
					<span class="title">生產管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($order))
						<a class="active" href="{{ url('/order') }}">訂單</a>
						@else
						<a href="{{ url('/order') }}">訂單</a>
						@endif
					</li>
					<li>
						@if(isset($mo))
						<a class="active" href="{{ url('/mo') }}">製程監控</a>
						@else
						<a href="{{ url('/mo') }}">製程監控</a>
						@endif
					</li>
					<li>
						@if(isset($error))
						<a class="active" href="{{ url('/error') }}">錯誤處理</a>
						@else
						<a href="{{ url('/error') }}">錯誤處理</a>
						@endif
					</li>
				</ul>
			</li>
			@if(isset($stock) || isset($procure) || isset($import) || isset($pick))
			<li class="open">
			@else
			<li>
			@endif 
				<a href="javascript:;">
					<i class="fa fa-list"></i>
					<span class="title">備料管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($stock))
						<a class="active" href="{{ url('/stock') }}">庫存狀況</a>
						@else
						<a href="{{ url('/stock') }}">庫存狀況</a>
						@endif
					</li>
					<li>
						@if(isset($procure))
						<a class="active" href="{{ url('/procure') }}">採購單</a>
						@else
						<a href="{{ url('/procure') }}">採購單</a>
						@endif
					</li>
					<li>
						@if(isset($import))
						<a class="active" href="{{ url('/import') }}">進貨單</a>
						@else
						<a href="{{ url('/import') }}">進貨單</a>
						@endif
					</li>
					<li>
						@if(isset($pick))
						<a class="active" href="{{ url('/pick') }}">領料單</a>
						@else
						<a href="{{ url('/pick') }}">領料單</a>
						@endif
					</li>
				</ul>
			</li>
			@if(isset($test))
			<li class="open">
			@else
			<li>
			@endif
				<a href="javascript:;">
					<i class="fa fa-check-square"></i>
					<span class="title">品質管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($test))
						<a class="active" href="{{ url('/test') }}">檢驗狀況</a>
						@else
						<a href="{{ url('/test') }}">檢驗狀況</a>
						@endif
					</li>
				</ul>
			</li>
			@if(isset($carry))
			<li class="open">
			@else
			<li>
			@endif
				<a href="javascript:;">
					<i class="fa fa-table"></i>
					<span class="title">搬運管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($carry))
						<a class="active" href="{{ url('/carry') }}">搬運狀況</a>
						@else
						<a href="{{ url('/carry') }}">搬運狀況</a>
						@endif
					</li>
				</ul>
			</li>
			@if(isset($storage))
			<li class="open">
			@else
			<li>
			@endif
				<a href="javascript:;">
					<i class="fa fa-file"></i>
					<span class="title">入庫管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($storage))
						<a class="active" href="{{ url('/storage') }}">入庫單</a>
						@else
						<a href="{{ url('/storage') }}">入庫單</a>
						@endif
					</li>
				</ul>
			</li>
			@if(isset($export))
			<li class="open">
			@else
			<li>
			@endif 
				<a href="javascript:;">
					<i class="fa fa-truck"></i>
					<span class="title">出貨管理</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" >
					<li>
						@if(isset($export))
						<a class="active" href="{{ url('/export') }}">出貨單</a>
						@else
						<a href="{{ url('/export') }}">出貨單</a>
						@endif
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>