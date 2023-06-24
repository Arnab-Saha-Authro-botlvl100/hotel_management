<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(Userinfo::class);
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

}
