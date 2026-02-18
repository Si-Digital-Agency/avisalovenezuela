<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\PublicationImage;
use Illuminate\Database\Eloquent\Model;



class Publication extends Model
{
    protected $casts = [
        'specs' => 'array',
    ];


    public function images()
    {
        return $this->hasMany(PublicationImage::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function userRelations()
    {
        return $this->belongsTo(User::class);
    }
}
