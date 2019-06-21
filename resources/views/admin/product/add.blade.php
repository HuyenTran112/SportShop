@extends('admin.master')
@section('title')
Thêm sản phẩm
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                     {{--  Them hình thì cần enctype  --}}
                    <form action="{{route('admin.product.getAdd')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="txtName" placeholder="Nhập tên sản phẩm" value="{!! old('txtName') !!}" />
                        </div>

                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                                <select class="form-control loaisanpham" name="txtCategory">
                                    <?php  $cate = DB::table('loaisanpham')->select('maloaisp','tenloaisp')->get();  ?>
                                    @foreach($cate as $item)
                                        <option value="{{$item->maloaisp}}">{{$item->tenloaisp}}</option>
                                    @endforeach
                                </select>
                        </div>					
						<div class="form-group">
                            <label>Nhà cung cấp</label>
							<select class="form-control loaisanpham" name="txtSupplier">
                                    <?php  $supplier = DB::table('nhacungcap')->get();  ?>
                                    @foreach($supplier as $item)
                                        <option value="{{$item->manhacungcap}}">{{$item->tennhacungcap}}</option>
                                    @endforeach
                                </select>
                        </div>
						<div class="form-group">
                            <label>Đơn giá</label>
                            <input class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" value="{!! old('txtPrice') !!}" />
                        </div>

                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input class="form-control" name="txtPromotion" placeholder="Nhập giá khuyến mãi" value="0"/>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="txtDescription">{{old('txtDescription')}}</textarea>
                        </div>
                        <script type="text/javascript">CKEDITOR.replace('txtDescription');</script>

                  

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="fImages">
                        </div>
						 <div class="form-group">
						 	@if($count>0)
                            <label>Màu</label></br>
							@foreach($mausac as $item)
                            <input type ="checkbox" name="color{{$item->mamau}}" value="{{$item->mamau}}"/>{{$item->tenmau}}<br />
							@endforeach
							@endif
                        </div>
						<div class="form-group">
						 	@if($count_size>0)
                            <label>Size</label></br>
							@foreach($size as $item)
                            <input type ="checkbox" name="size{{$item->masize}}" value="{{$item->masize}}"/>{{$item->tensize}}<br />
							@endforeach
							@endif
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
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
