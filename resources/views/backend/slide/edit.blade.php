@extends('backend.master')
@section('head', 'Slide')
@section('title', 'edit')
@section('content')
    <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
        @csrf
    <div class="col-lg-7" style="padding-bottom:120px">

            <div class="form-group">
                <label>Link</label>
                <input class="form-control" name="txtLink" placeholder="Please Enter Username" value="{!! old('txtLink', isset($slide_edt) ? $slide_edt['link'] : null) !!}"/>
            </div>

            <div class="form-group">
                <label>Images</label>
                <input type="file" name="sImages">
                <img style="width: 200px; height: 150px" src="{!! url('resources/views/slide/'.$slide_edt['image']) !!}" />
                <input type="hidden" name="img_current" value="{!! $slide_edt['image'] !!}"/>
            </div>
            <button type="submit" class="btn btn-default">Product Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    </form>
@endsection
