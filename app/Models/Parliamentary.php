<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parliamentary extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function admentments()
    {
        return $this->hasMany(Amendment::class);
    }
}
