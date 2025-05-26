<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'brand_id',
        'product_name',
        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'product_price',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trendy',
        'image_one',
        'image_two',
        'image_three',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

<<<<<<< HEAD
    public function subCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
    public function subCategory()
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
