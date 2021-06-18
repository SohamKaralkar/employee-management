<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function address() 
    {
        return $this->hasMany(Address::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function whatsappnumber()
    {
        return $this->hasMany(WhatsappNumber::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
