<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable = ['post_category_id', 'title_en', 'title_bn', 'image', 'details_en', 'details_bn'];
}
