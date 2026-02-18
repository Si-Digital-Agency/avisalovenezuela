<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function subCategories(){
        return $this->belongsTo(subCategory::class);
    }
}
