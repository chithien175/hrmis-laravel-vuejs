<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'slug', 'photo', 'description', 'publish', 'price', 'counter', 'user_id'];
}
