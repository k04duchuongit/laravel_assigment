@extends('app')
@section('content')
    <div class="title my-3">
        <h3 class="bg-primary p-2">Products</h3>

        <a href="{{ route('product.add') }}" class="btn btn-success">Add Product</a>
    </div>
    @if (@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>

                <th scope="col">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="col">{{ $product->id }}</th>
                    <td scope="col">{{ $product->name }}</td>
                    <td scope="col">{{ $product->price }}</td>
                    <td scope="col">{{ $product->quantity }}</td>
                    <td scope="col" ><img style="height: 100px; width: 100px;" src="{{asset('uploads/uploads/'.$product->path_img) }}"
                            alt=""></td>
                    <td scope="col">
                        @foreach ($categories as $cate)
                            @if ($product->category_id == $cate->id)
                    <td>{{ $cate->name }}</td>
                            @endif
                        @endforeach
            </td>

            <td scope="col">{{ $product->status }}</td>
            <td>
                <a href="{{ route('product.show',$product->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('product.update',$product->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('product.destroy',$product->id) }}" class="btn btn-danger">Delete</a>

            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
