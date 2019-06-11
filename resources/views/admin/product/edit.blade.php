@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                    <form action="{{route('admin.product.getEdit', $item->masp)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="txtName" value="{{$item->tensp}}" required/>
                        </div>
                        
                        {{--  Loại sản phẩm  --}}
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                                <select class="form-control" name="txtCategory" value="{{$item->tenloaisp}}" required>
                                    <?php  $cate = DB::table('loaisanpham')->select('maloaisp','tenloaisp')->get();  ?>
                                    @foreach($cate as $data)
                                        @if($data->maloaisp == $item->maloaisp)
                                             <option value="{{$data->maloaisp}}" selected="selected">
                                                {{$data->tenloaisp}}
                                             </option>
                                        @else
                                             <option value="{{$data->maloaisp}}">
                                                {{$data->tenloaisp}}
                                             </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        {{--  Mô tả sản phẩm  --}}
                        <div class="form-group">
                            <label>Miêu tả</label>
                            <textarea class="form-control" name="txtDescription">{{$item->mieuta}}</textarea>
                        </div>
                        <script type="text/javascript">CKEDITOR.replace('txtDescription');</script>

                        {{--  Giá  --}}
                        <div class="form-group">
                            <label>Đơn giá</label>
                            <input class="form-control" name="txtPrice" value="{{$item->dongia}}"/>
                        </div>

                        {{--  Giá khuyến mãi  --}}
                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input class="form-control" name="txtPromotion" value="{{$item->giakhuyenmai}}"/>
                        </div>

                        {{--  Hình ảnh hiện tại  --}}
                        <div class="form-group">
                            <label>Hình ảnh hiện tại</label><br>
                            <img src="{!! url('../public/image/'.$item->hinhanh) !!}" class="image_current" style="width:250px; height:250px">
                            <input type="hidden" name="img_crurent" value="{{$item->hinhanh}}">
                        </div>

                        {{--  Hình ảnh mới  --}}
                        <div class="form-group">
                            <label>Hình ảnh mới</label>
                            <input type="file" name="fImages">
                        </div>
                        <button type="submit" class="btn btn-default">Edit</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
