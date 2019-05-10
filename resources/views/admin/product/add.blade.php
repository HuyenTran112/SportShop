@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                     {{--  Them hình thì cần enctype  --}}
                    <form action="{{route('admin.product.getAdd')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="txtName" placeholder="Nhập tên sản phẩm" value="{!! old('txtName') !!}" />
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                                <select class="form-control" name="txtCategory">
                                    {{--  <option selected value="1">Áo Thun</option>
                                    <option value="2">Áo Sơ Mi</option>  --}}
                                    <?php  $cate = DB::table('type_products')->select('id','name')->get();  ?>
                                    @foreach($cate as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="txtDescription">{{old('txtDescription')}}</textarea>
                        </div>
                        <script type="text/javascript">CKEDITOR.replace('txtDescription');</script>

                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" value="{!! old('txtPrice') !!}" />
                        </div>

                        <div class="form-group">
                            <label>Promotion</label>
                            <input class="form-control" name="txtPromotion" placeholder="Nhập giá khuyến mãi" value="{!! old('txtPromotion') !!}"/>
                        </div>

                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="fImages">
                        </div>

                        <button type="submit" class="btn btn-default">Add</button>
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
