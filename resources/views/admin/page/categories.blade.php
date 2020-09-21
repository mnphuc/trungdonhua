@extends('admin.master')
@section('title', 'Quản Lý Danh Mục Sản Phẩm')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Danh Mục</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addCategories">
            <span class="icon text-white-50">
                     <i class="fas fa-plus"></i>
                    </span>
            <span class="text">Thêm Danh Mục</span>
        </button>
        <div class="table-responsive" style="margin-top: 5px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Logo</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Tạo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Logo</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Tạo</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($categories as $cat)

                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->categories_name}}</td>
                        <td>@if($cat->images == null)
                            Không Có Logo
                                @else
                                    <img src="{{$cat->images}}" style="height: 40px">
                            @endif
                        </td>
                        <td>@if($cat->status == 1)
                                Hiện Thị
                            @else
                                Ẩn
                            @endif
                        </td>
                        <td>{{$cat->created_at}}</td>
                        <td>

                                    <form action="{{ route('danhmuc.destroy',$cat->id) }}" method="POST">

                                        <button type="button" id="edit{{$cat->id}}" class="btn btn-primary btn-icon-split edit" data-id="{{$cat->id}}" data-categories_name="{{$cat->categories_name}}" data-images="{{$cat->images}}" data-status="{{$cat->status}}" data-toggle="modal" data-target="#editCategories">
                                            <span class="text">Sửa</span>
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >Xóa</button>
                                    </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal add categories -->
    <div class="modal fade" id="addCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục Sản Phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('danhmuc.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="categories_name">Tên Danh Mục</label>
                            <input type="text" name="categories_name" class="form-control {{$errors->has('categories_name') ? 'is-invalid' : ''}}" id="categories_name" placeholder="Bàn, Ghế, ..." value="{{ old('categories_name') }}" >
                            @if($errors->has('categories_name'))
                                <div class="invalid-feedback">{{ $errors->first('categories_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo_image">Logo</label>
                            <input type="file" name="images" class="form-control" id="logo_image" placeholder="Ảnh" style="display: none" value="{{old('images')}}">
                            <img id="show_image" src="assets/images/no-img.png" alt="..." class="img-thumbnail" style="width: 30%;">
                            @if($errors->has('images'))
                                <div class="invalid-feedback">{{ $errors->first('images') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label >Trạng Thái</label>
                            <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_true" value="1" checked>
                                <label class="form-check-label" for="status_true">Hiện Thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_false" value="0">
                                <label class="form-check-label" for="status_false">Ẩn</label>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<!-- modal edit categories -->
<div class="modal fade" id="editCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Danh Mục Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="eid">
                    <div class="form-group">
                        <label for="ecategories_name">Tên Danh Mục</label>
                        <input type="text" name="categories_name" class="form-control {{$errors->has('categories_name') ? 'is-invalid' : ''}}" id="ecategories_name" placeholder="Bàn, Ghế, ..." value="{!! old('categories_name') !!}" >
                        @if($errors->has('categories_name'))
                            <div class="invalid-feedback">{{ $errors->first('categories_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="elogo_image">Logo</label>
                        <input type="file" name="images" class="form-control elogo" id="elogo_image" placeholder="Ảnh" style="display: none" value="{{old('images')}}">
                        <img id="eshow_image" src="assets/images/no-img.png" alt="..." class="img-thumbnail show_edit_images" style="width: 30%;">
                        @if($errors->has('images'))
                            <div class="invalid-feedback">{{ $errors->first('images') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label >Trạng Thái</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="estatus_true" value="1">
                                <label class="form-check-label" for="estatus_true">Hiện Thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="estatus_false" value="0">
                                <label class="form-check-label" for="estatus_false">Ẩn</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('CustomStyle')
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('ScriptPlugin')
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myToast").toast('show');
            $('body').on('click', '.edit',function() {
                var getId = $(this).data('id');
                var getName = $(this).data('categories_name');
                var getImages = $(this).data('images');
                var getStatus = $(this).data('status');
                $('#eid').val(getId);
                if (getImages == null || getImages.length == 0){
                    $('.show_edit_images').attr('src', 'assets/images/no-img.png');
                }else{
                    $('.show_edit_images').attr('src', getImages);
                }
                $("#form_edit").attr('action', 'admin/danhmuc/'+getId);
                $('#ecategories_name').val(getName);
                if (getStatus == 1){
                    $('#estatus_true').attr('checked', true);
                }else{
                    $('#estatus_false').attr('checked', true);
                }
            });
        });
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
            // show model khi gặp lỗi
            @if(session('check_action')=='add' && count($errors) > 0)
                $('#addCategories').modal('show');
                $.notify("Thêm Thất Bại", "false");
            @endif
            @if (session('check_action')=='edit' && count($errors) > 0)
            $(document).ready(function(){
                $("#edit{{ session('eid') }}").trigger('click');
            });
            @endif
{{--            @if(count($errors)>0)--}}
{{--            //$('#addCategories').modal('show');--}}
{{--            $.notify("Access granted", "success");--}}
{{--            @endif--}}

        });
        //load ảnh render url
        $(document).ready(function() {
            $('#show_image').click(function(){
                $('#logo_image').click();
            });
        });
        $(function(){
            $("#logo_image").change(showPreviewImage_click);
        })

        $(document).ready(function() {
            $('#eshow_image').click(function(){
                $('#elogo_image').click();
            });
        });
        $(function(){
            $("#elogo_image").change(showPreviewImage_click);
        })
        function showPreviewImage_click(e) {
            var $input = $(this);
            var inputFiles = this.files;
            if(inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var reader = new FileReader();
            reader.onload = function(event) {
                $input.next().attr("src", event.target.result);
            };
            reader.onerror = function(event) {
                alert("I AM ERROR: " + event.target.error.code);
            };
            reader.readAsDataURL(inputFile);
        }
        $(document).ready(function(){

        });
    </script>
@endsection
