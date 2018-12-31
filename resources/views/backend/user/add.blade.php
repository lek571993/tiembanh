@extends('backend.master')
@section('head', 'Product')
@section('title', 'add')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('backend.block.error')
        <form action="{!! route('admin.user.getAdd') !!}" method="POST">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{!! old('txtUser') !!}"/>
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
                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtPass') !!}"/>
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" class="form-control" name="txtFullname" placeholder="Please Enter Email" value="{!! old('txtFullname') !!}"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Email" value="{!! old('txtAddress') !!}"/>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="txtPhone" placeholder="Please Enter Email" value="{!! old('txtPhone') !!}"/>
            </div>
            <div class="form-group">
                <label>User Level</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" type="radio">Member
                </label>
            </div>
            <button type="submit" class="btn btn-default">User Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
@endsection

