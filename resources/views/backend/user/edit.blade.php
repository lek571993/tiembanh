@extends('backend.master')
@section('head', 'Product')
@section('title', 'add')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('backend.block.error')
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="txtUser" value="{!! old('txtUser', isset($user) ? $user['username'] : null) !!}" disabled/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>RePassword</label>
                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail', isset($user) ? $user['email'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" class="form-control" name="txtFullname" placeholder="Please Enter Fullname" value="{!! old('txtFullname', isset($user) ? $user['fullname'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" value="{!! old('txtAddress', isset($user) ? $user['address'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" class="form-control" name="txtPhone" placeholder="Please Enter Phone" value="{!! old('txtPhone', isset($user) ? $user['phone'] : null) !!}"/>
            </div>
            @if(Auth::user()->id == 1)
            <div class="form-group">
                <label>User Level</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                </label>
                @if($id != 1)
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" type="radio">Member
                </label>
                @endif
            </div>
            @endif
            <button type="submit" class="btn btn-default">User Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
@endsection
