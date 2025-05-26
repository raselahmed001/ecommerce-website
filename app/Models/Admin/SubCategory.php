<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['sub_category_name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
<<<<<<< HEAD
        return $this->hasMany(Product::class);
=======
        return $this->hasMany(Priduct::class);
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
    }
}
