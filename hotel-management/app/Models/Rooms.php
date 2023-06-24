<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'rooms';

    // Define the primary key column name
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'bed',
        'person',
        'seaview',
        'price',
        'vip',
        'is_available',
        'size',
        'image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }



}
