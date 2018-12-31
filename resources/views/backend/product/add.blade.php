@extends('backend.master')
@section('head', 'Product')
@section('title', 'add')
@section('content')
    <form action="{!! route('admin.product.getAdd') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-7" style="padding-bottom:120px">
        @include('backend.block.error')
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtParentId">
                    <option value="">Please Choose Category</option>
                    <?php cate_parent1($data, 0, "--", old('txtParentId')); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice') !!}"/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Product Keywords" value="{!! old('txtKeywords') !!}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
            </div>

            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        @for($i = 1; $i <= 5; $i++)
            <div class="form-group">
                <label>Product Detail {!! $i !!}</label>
                <input type="file" name="ProductDetail[]" />
            </div>
        @endfor
    </div>
    </form>
@endsection
