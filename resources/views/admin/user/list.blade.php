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
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection