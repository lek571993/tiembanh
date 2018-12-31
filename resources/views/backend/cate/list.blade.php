@extends('backend.master')
@section('title', 'add')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Category Parent</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=0; ?>
            @foreach($cate as $ct)
            <?php $stt+=1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $ct->name !!}</td>
                <td>{!! $ct->parent_id !!}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!! route('admin.cate.getDelete', [$ct->id, $ct->alias]) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.cate.getEdit', [$ct->id, $ct->alias]) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
