<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
      public function publications()
    {
        return $this->hasMany(Publication::class);
    }
      public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
