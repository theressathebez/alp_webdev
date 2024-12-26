<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
       'stage_name',
       'stage_start',
       'stage_end'
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function outputs()
    {
        return $this->hasMany(Output::class);
    }
}
