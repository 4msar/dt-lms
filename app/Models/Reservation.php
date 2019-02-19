<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "book_id", "user_id", "issue_date", "return_date", "returned_at", "status"
    ];

    public function take_by()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function book()
    {
    	return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
