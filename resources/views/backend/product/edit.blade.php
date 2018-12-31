<style>
    .btn-del {
        position: relative;
        top: -70px;
        left: -20px;
    }
</style>
@extends('backend.master')
@section('head', 'Product')
@section('title', 'edit')
@section('content')
    <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
        @csrf
    <div class="col-lg-7" style="padding-bottom:120px">

            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtParentId">
                    <option value="">Please Choose Category</option>
                    <?php cate_parent1($data, 0, "--", $product['cate_id']); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : null) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product) ? $product['content'] : null) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
                <img style="width: 200px; height: 150px" src="{!! url('resources/views/upload/'.$product['image']) !!}" />
                <input type="hidden" name="img_current" value="{!! $product['image'] !!}"/>
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Product Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        @foreach($product_img as $key => $item)
        <div class="form-group" id="{!! $key !!}">
            <img style="width: 200px; height: 150px" src="{!! url('resources/views/detail/'.$item['image']) !!}" idHinh="{!! $item['id'] !!}" id="{!! $key !!}"/>
            <a href="javascript:void(0)" class="btn btn-danger btn-circle btn-del" id="del_img" type="button"><i class="fa fa-times"></i></a>
        </div>
        @endforeach
        <button class="btn btn-primary" id="btnAdd" type="button">Add File</button>
        <div class="addFile"></div>
    </div>
    </form>
@endsection
