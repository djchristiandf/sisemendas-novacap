<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parliamentary extends Model
{
    use HasFactory;
    protected $table = 'parliamentarians';
    protected $fillable = ['name'];

    public function amendments()
    {
        return $this->hasMany(Amendment::class);
    }
}
