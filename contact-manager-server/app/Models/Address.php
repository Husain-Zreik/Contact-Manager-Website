<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
