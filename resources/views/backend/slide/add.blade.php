@extends('backend.master')
@section('head', 'Product')
@section('title', 'add')
@section('content')
    <form action="{!! route('admin.slide.getAdd') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-7" style="padding-bottom:120px">
        @include('backend.block.error')
            <div class="form-group">
                <label>Link</label>
                <input class="form-control" name="txtLink" placeholder="Please Enter Link" value="{!! old('txtLink') !!}"/>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="sImages">
            </div>
            <button type="submit" class="btn btn-default">Slide Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    </form>
@endsection
