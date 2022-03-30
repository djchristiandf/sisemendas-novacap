<?php

namespace App\Models;
use App\Scopes\FilterSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    use HasFactory, FilterSearchScope;

    protected $fillable = [
        'parliamentaries_id',
        'progress_id',
        'viabilities_id',
        'users_id',
        'amendment',
        'caption',
        'work_program',
        'nature_of_expense',
        'price',
        'viability'];

    public $filterColumns = ['id'];
    public $searchColumns = ['parliamentary',
        'amendment',
        'caption',
        'work_program',
        'nature_of_expense',
        'price',
        'viability'];

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function viability()
    {
        return $this->hasOne(Viability::class);
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }

    public function parliamentary()
    {
        return $this->hasOne(Parliamentary::class);
    }
}
