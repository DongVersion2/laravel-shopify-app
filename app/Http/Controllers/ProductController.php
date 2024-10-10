<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // Tăng số lượt xem sản phẩm
        $product = Product::findOrFail($id);
        $product->views = $product->views + 1;
        $product->save();

        // Hoặc cập nhật trong cơ sở dữ liệu lưu trữ riêng nếu cần

        return view('product.show', compact('product'));
    }
}
