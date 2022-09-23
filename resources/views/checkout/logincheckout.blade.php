
@extends('layouts.master')
@section('title')
<title>Tài khoản</title>
@endsection()

@section('css')
<link rel='stylesheet' href="{{asset('home/home.css')}}">	
@endsection()

@section('js')
<link rel='stylesheet' href="{{asset('home/home.js')}}">
@endsection()

@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{URL::to('/login_customer')}}" method="POST">
						{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="pwd_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí!</h2>
						<form action="{{URL::to('/add_customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="name" placeholder="Họ và Tên"/>
							<input type="email" name="email" placeholder="Email"/>						
							<input type="password" name="password" placeholder="Mật khẩu"/>
							<input type="text" name="phone" placeholder="Phone"/>

							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    @endsection