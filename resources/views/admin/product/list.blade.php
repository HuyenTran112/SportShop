@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Date </th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listItem as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                     <?php $cate = DB::table('type_products')->where('id',$item->id_type)->first(); ?>
                                    @if(!empty($cate->name))
                                        {!! $cate->name !!}
                                    @endif
                                </td>
                                <td>
                                @if($item->promotion == 0) 
                                    {{number_format($item->price, 3)}} VND
                                @else
                                    {{number_format($item->promotion, 3)}} VND
                                @endif
                                </td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans();
                                     ?>
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có xác nhận xóa?')" href="{{route('admin.product.getDelete', $item->id)}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.getEdit', $item->id)}}">Edit</a></td>
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
