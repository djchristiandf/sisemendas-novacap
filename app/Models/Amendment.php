<?php

namespace App\Models;
use App\Scopes\FilterSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    use HasFactory, FilterSearchScope;

    protected $table = 'amendments';

    protected $fillable = [
        'parliamentarians_id',
        'progress_id',
        'viability_id',
        'users_id',
        'amendment',
        'caption',
        'work_program',
        'nature_of_expense',
        'price'];

    public $filterColumns = ['id'];
    public $searchColumns = [
        'parliamentary',
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
        return $this->belongsTo(Viability::class, 'viability_id');
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }

    public function parliamentary()
    {
        return $this->belongsTo(Parliamentary::class, 'parliamentarians_id');
    }
}
