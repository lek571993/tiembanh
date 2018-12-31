@extends('backend.master')
@section('title', 'add')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtParentId">
                    <option value="0">Please Choose Category</option>
                    <?php cate_parent1($data, 0, "--", $cate->id); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName', isset($cate) ? $cate['name'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Category Order</label>
                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder', isset($cate) ? $cate['order'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Category Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($cate) ? $cate['keywords'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($cate) ? $cate['description'] : null) !!}</textarea>
            </div>

            <button type="submit" class="btn btn-default">Category Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
@endsection
