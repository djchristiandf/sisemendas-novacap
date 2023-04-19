<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viability extends Model
{
    use HasFactory;

    protected $table = 'viability';

    protected $fillable = ['name'];

    public function amendments()
    {
        return $this->hasMany(Amendment::class);
    }
}
