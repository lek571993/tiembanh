@extends('backend.master')
@section('head', 'Product')
@section('title', 'add')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=0; ?>
            @foreach($user as $value)
            <?php $stt+=1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $value['username'] !!}</td>
                <td>{!! $value['email'] !!}</td>
                <td>
                    @if($value['level'] == 1 && $value['id'] == 1)
                        Super Admin
                    @elseif($value['level'] == 1)
                        Admin
                    @else
                        Member
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{!! route('admin.user.getDelete', $value['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.user.getEdit', $value['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection