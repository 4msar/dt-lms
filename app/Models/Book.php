<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "book_name", "author_name", "published_at", "owner_id", "category_id", "image", "is_available", "hub_id", "quantity", "status"
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function hub()
    {
    	return $this->belongsTo(Branch::class, 'hub_id', 'id');
    }
}
