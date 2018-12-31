@extends('frontend.master')
@section('title', 'Đăng nhập')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.blade.php">Home</a> / <span>Đăng nhập</span>
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
					@if(Session('flash'))
						<div class="col-lg-12 alert alert-{!! Session('level') !!}">
							{!! Session('flash') !!}
						</div>
					@endif
				</div>
			</div>
			<form action="{!! route('front.getLogin') !!}" method="post">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label>Username*</label>
							<input type="text" id="username" name="txtUsername" >
						</div>
						<div class="form-block">
							<label>Password*</label>
							<input type="password" id="password" name="txtPassword" >
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
