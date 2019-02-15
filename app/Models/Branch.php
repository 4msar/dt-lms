<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "hub_id", "address", "area", "map_link", "contact_person_id", "contact_number", "close_days", "open_time", "status"
    ];
}
