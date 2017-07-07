<div class="page-topbar ">
	<div class="logo-area">
</div>
<div class="quick-area">
	<div class="pull-left">
		<ul class="info-menu left-links list-inline list-unstyled">
			<li class="sidebar-toggle-wrap">
				<a href="#" data-toggle="sidebar" class="sidebar_toggle">
					<i class="fa fa-bars"></i>
				</a>
			</li>
			<li class="notify-toggle-wrapper">
				<a href="#" data-toggle="dropdown" class="toggle">
					<i class="fa fa-bell"></i>
					<span class="badge badge-accent">{{ $num }}</span>
				</a>
				<ul class="dropdown-menu notifications animated fadeIn">
					<li class="total">
						<span class="small">
							您有<strong>{{ $num }}</strong>個通知。
						</span>
					</li>
					<li class="list">
						<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
							@foreach($notification as $n)
							<li class="unread busy">
								<div class="notice-icon">
									<i class="fa fa-exclamation-triangle"></i>
								</div>
								<div>
									<span class="name">
										<strong>訂單編號：{{ $n->o_id }}</strong>
										<span class="time small">{{ $n->r_time }}</span>
									</span>
								</div>
							</li>
							@endforeach
						</ul>
					</li>
					<li class="external">
						<a href="{{ url('/error') }}">
							<span>顯示全部</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="hidden-sm hidden-xs searchform">
				<form action="{{ action('ShowDataController@getSearchResult') }}" method="get">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-search"></i>
						</span>
						<input type="text" class="form-control animated fadeIn" name="keyword" placeholder="搜尋工作站">
					</div>
					<input type="submit">
				</form>
			</li>
		</ul>
	</div>
	<div class="pull-right">
		<ul class="info-menu right-links list-inline list-unstyled">
			<li class="profile">
				<a href="#" data-toggle="dropdown" class="toggle">
					<img src="{{ asset('assets/images/profile.jpg') }}" alt="user-image" class="img-circle img-inline">
					<span>{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></span>
				</a>
				<ul class="dropdown-menu profile animated fadeIn">
					<li>
						<a href="{{ url('/logout') }}">
							<i class="fa fa-sign-out"></i>
							登出
						</a>
					</li>
				</ul>
			</li>
		</ul>			
	</div>
</div>
</div>