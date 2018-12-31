@extends('backend.master')
@section('head', 'Category')
@section('title', 'add')
@section('content')
        <div class="col-lg-7" style="padding-bottom:120px">

            <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Category Parent</label>
                    <select class="form-control" name="txtParentId">
                        <option value="0">Please Choose Category</option>
                        <?php cate_parent1($parent); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                </div>
                <div class="form-group">
                    <label>Category Order</label>
                    <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
                </div>
                <div class="form-group">
                    <label>Category Keywords</label>
                    <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
                </div>
                <div class="form-group">
                    <label>Category Description</label>
                    <textarea class="form-control" rows="3" name="txtDescription"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Category Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
@endsection

