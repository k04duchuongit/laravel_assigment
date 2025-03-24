@extends('app')
@section('content')
    <div class="title my-3">
        <h3 class="bg-primary p-2">Products detail</h3>

        <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Chi tiết sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="{{ asset('uploads/uploads/' . $product->path_img) }}" alt="Hình ảnh sản phẩm" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Tên sản phẩm:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Giá:</th>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Số lượng:</th>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Danh mục:</th>
                                <td>{{ $product->category->name ?? 'Chưa có danh mục' }}</td>
                            </tr>
                            <tr>
                                <th>Mô tả:</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái:</th>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success">Còn hàng</span>
                                    @else
                                        <span class="badge bg-danger">Hết hàng</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-warning">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
