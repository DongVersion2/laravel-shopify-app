<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // Chỉ định tên bảng cụ thể
    protected $table = 'products'; // hoặc 'product' nếu bảng có tên như vậy
}
