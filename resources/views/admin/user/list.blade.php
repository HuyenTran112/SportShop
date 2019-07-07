@section('title')
Danh sách user admin
@endsection
@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <div class="col-lg-12">
                                    @if(Session::has('flash_message'))
                                         <div class="alert alert-{{Session::get('flash_level')}}">
                                             {{ Session::get('flash_message')}}
                                        </div>
                                     @endif
                                </div>
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Email Address</th>
                                <th>Level</th>
                                <th>Tên hiện thị</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($listItem as $item)
                        <tr class="even gradeC" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->email}}</td>
							@if($item->level==1)
							 	<td>Admin</td>
							@else
								<td>Member</td>
							@endif
							<td>{{$item->tenhienthi}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có xác nhận xóa?')" href="{{route('admin.user.getDelete', $item->id)}}" >Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.user.getEditUser', $item->id)}}">Edit</a></td>
							
                        </tr>
                        @endforeach
                    
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection