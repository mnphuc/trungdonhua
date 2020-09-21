@extends('admin.master')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lý Sản Phẩm</h6>
        </div>
        <div class="card-body">
            <a href="{{route('product.create')}}" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span> <span class="text">Thêm Sản Phảm</span></a>
            <div class="table-responsive" style="margin-top: 5px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Nhãn Hiệu</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th>Ngày Tạo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Nhãn Hiệu</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th>Ngày Tạo</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($product as $pro)

                        <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->product_name}}</td>
                            <td>{{$pro->categories->categories_name}}</td>
                            <td>
                                    <img src="{{$pro->image}}" style="height: 40px">
                            </td>
                            <td>{{$pro->price}}</td>
                            <td>{{$pro->trademark}}</td>
                            <td>{{html_entity_decode($pro->description)}}</td>
                            <td>@if($pro->status == 1)
                                    Còn Hàng
                                @elseif($pro->status == 2)
                                    Hết Hàng
                                    @else
                                    Ngừng Bán
                                @endif
                            </td>
                            <td>{{$pro->created_at}}</td>
                            <td>
                                <form action="{{ route('product.destroy',$pro->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('product.edit',$pro->id) }}">Edit</a>
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
@endsection
@section('CustomStyle')
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('ScriptPlugin')
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script >
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
