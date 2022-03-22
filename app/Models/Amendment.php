<?php

namespace App\Models;
use App\Scopes\FilterSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    use HasFactory, FilterSearchScope;

    protected $fillable = [
        'parliamentary',
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
}
