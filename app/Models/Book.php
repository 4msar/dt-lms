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
        "book_name", "author_name", "published_at", "owner_id", "category_id", "image", "is_available", "available_id", "hub_id", "quantity", "status"
    ];
}
