@section('title','會員註冊')

<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		@include('partials.head')
	</head>
	<body class=" login_page">
		<div class="container-fluid">
			<div class="login-wrapper row">
				<div id="login" class="login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4">
					<h1><a title="Login Page" tabindex="-1">會員註冊</a></h1>
					<form name="loginform" id="loginform" action="{{ url('/register') }}" method="post">
						{{ csrf_field() }}
						<p>
							<label for="name">姓名<br />
								<input type="text" name="name" id="name" class="input" placeholder="姓名" size="20" value="{{ old('name') }}" required /></label>
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
						</p>
						<p>
							<label for="email">帳號<br />
								<input type="email" name="email" id="email" class="input" placeholder="帳號" size="20" value="{{ old('email') }}" required /></label>
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
						</p>
						<p>
							<label for="password">密碼<br />
								<input type="password" name="password" id="password" class="input" placeholder="密碼" size="20" required /></label>
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
						</p>
						<p>
							<label for="password_confirmation">確認密碼<br />
								<input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="確認密碼" size="20" required /></label>
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
						</p>
						<p class="submit">
							<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-accent btn-block" value="註冊" />
						</p>
					</form>
					<p id="nav">
						<a class="pull-right" href="{{ url('/login') }}" title="登入">登入</a>
					</p>
				</div>
			</div>
		</div>
		@include('partials.footer')
	</body>
</html>