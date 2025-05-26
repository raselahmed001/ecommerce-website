<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    public function products()
    {
<<<<<<< HEAD
        return $this->hasMany(Product::class);
    }


=======
        return $this->hasMany(Priduct::class);
    }

>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
}


