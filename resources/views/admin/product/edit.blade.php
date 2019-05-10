@extends('admin.master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                    <form action="{{route('admin.product.getEdit', $item->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="txtName" value="{{$item->name}}" required/>
                        </div>
                        
                        {{--  Loại sản phẩm  --}}
                        <div class="form-group">
                            <label>Category</label>
                                <select class="form-control" name="txtCategory" value="{{$item->id_type}}" required>
                                    {{--  @if($item->id_type == 1)
                                        <option selected value="1">Áo thun</option>
                                        <option value="2">Áo sơ mi</option>
                                    @else
                                        <option value="1">Áo thun</option>
                                        <option selected value="2">Áo sơ mi</option>
                                    @endif  --}}
                                    <?php  $cate = DB::table('type_products')->select('id','name')->get();  ?>
                                    @foreach($cate as $data)
                                        @if($data->id == $item->id_type)
                                             <option value="{{$data->id}}" selected="selected">
                                                {{$data->name}}
                                             </option>
                                        @else
                                             <option value="{{$data->id}}">
                                                {{$data->name}}
                                             </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        {{--  Mô tả sản phẩm  --}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="txtDescription">{{$item->description}}</textarea>
                        </div>
                        <script type="text/javascript">CKEDITOR.replace('txtDescription');</script>

                        {{--  Giá  --}}
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="txtPrice" value="{{$item->price}}"/>
                        </div>

                        {{--  Giá khuyến mãi  --}}
                        <div class="form-group">
                            <label>Promotion</label>
                            <input class="form-control" name="txtPromotion" value="{{$item->promotion}}"/>
                        </div>

                        {{--  Hình ảnh hiện tại  --}}
                        <div class="form-group">
                            <label>Current image</label><br>
                            <img src="{!! url('../resources/images/'.$item->image) !!}" class="image_current" style="width:250px; height:250px">
                            <input type="hidden" name="img_crurent" value="{{$item->image}}">
                        </div>

                        {{--  Hình ảnh mới  --}}
                        <div class="form-group">
                            <label>Images</label>
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
