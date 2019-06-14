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
                                <th>Mã người dùng</th>
                                <th>Tên đăng nhập</th>
                                <th>Tên nhóm người dùng</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listItem as $listUser)
                                    <tr class="odd gradeX" align="center">
                                            <td>{{$listUser->id}}</td>
                                            <td>{{$listUser->username}}</td>
                                            <td>{{$listUser->name}}</td>
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a >Edit</a></td>
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