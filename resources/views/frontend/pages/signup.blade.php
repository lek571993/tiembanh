@extends('frontend.master')
@section('title', 'Đăng ký')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{!! route('front.index') !!}">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					@include('backend.block.error')
				</div>
			</div>

			<form action="{!! route('front.getRegister') !!}" method="post">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label>Username*</label>
							<input type="text" id="user" name="txtUsername" value="{!! old('txtUsername') !!}">
						</div>

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="txtEmail" value="{!! old('txtEmail') !!}">
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="txtFullname" value="{!! old('txtFullname') !!}">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name="txtAddress" value="{!! old('txtAddress') !!}">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="number" id="phone" name="txtPhone" value="{!! old('txtPhone') !!}">
						</div>
						<div class="form-block">
							<label>Password*</label>
							<input type="password" id="pass" name="txtPassword">
						</div>
						<div class="form-block">
							<label>Re password*</label>
							<input type="password" id="repass" name="txtRePassword">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection