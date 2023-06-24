<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model implements Authenticatable
{
    // Define the table associated with the model
    protected $table = 'userinfo';

    // Define the primary key column name
    protected $primaryKey = 'id';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'nid',
        'is_delete',
        'role'
    ];

    public $timestamps = false;

    // Implement the required methods from the Authenticatable interface
    public function getAuthIdentifierName()
    {
        return $this->email;
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->primaryKey};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // not implemented
    }

    public function setRememberToken($value)
    {
        // not implemented
    }

    public function getRememberTokenName()
    {
        return null; // not implemented
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    
    // Add any additional methods or relationships relevant to the model

}
