<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStoreRequest;


class ProductController extends Controller
{
    function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('indexProduct', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();

        $file = $request->file('image');
        $customNameFile = 'duchuong_' . Str::uuid() . '.' . $request->image->getClientOriginalExtension();
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'path_img' => $customNameFile,
            'category_id' => $request->category_id,
            'description' => $request->desc,
            'status' => $request->status
        ]);
        $path = $file->storeAs('uploads', $customNameFile, 'dir_public_edit');  //storeAs lưu file với tên mới

        if ($product && $path) {
            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
        } else {
            return redirect()->route('product.add')->with('error', 'Thêm sản phẩm thất bại , thử lại sau');
        }

        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('detailProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'hien form sua';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::withTrashed()->find($id);
        $statusDelete =  $product->forceDelete();

        if (!$product) {
            dd(123);
            return redirect()->route('product.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        if ($product) {
            $product->forceDelete();
            return redirect()->route('product.index')->with('success', 'Sản phẩm đã bị xóa vĩnh viễn.');
        }
    }
}
