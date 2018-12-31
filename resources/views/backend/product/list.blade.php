@extends('backend.master')
@section('head', 'Product')
@section('title', 'list')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0; ?>
            @foreach($product as $item)
            <?php $stt+=1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item['name'] !!}</td>
                <td>{!! number_format($item['price'], 0, ',', '.') !!}</td>
                <td>
                    <?php $cate = DB::table('cates')->where('id', $item['cate_id'])->first(); ?>
                    {!! $cate->name !!}
                </td>
                <td>
                    {!! \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!! route('admin.product.getDelete', [$item['id'], $item['alias']]) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.product.getEdit', [$item['id'], $item['alias']]) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
