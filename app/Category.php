<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'parent_id'
    ];

    public function getPathAttribute()
    {
        return route('categories.show', $this->id);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
