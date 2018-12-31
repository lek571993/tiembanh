@extends('backend.master')
@section('head', 'Slide')
@section('title', 'list')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Image</th>
                <th>Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0; ?>
            @foreach($slide as $item)
            <?php $stt+=1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item['image'] !!}</td>
                <td>
                    {!! \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!! route('admin.slide.getDelete', $item['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.slide.getEdit', $item['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
