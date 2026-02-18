<?php

namespace App\Models;


use App\Models\Publication;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
      public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
