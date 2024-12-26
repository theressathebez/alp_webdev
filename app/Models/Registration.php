<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
       'registration_date'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function outputs()
    {
        return $this->hasMany(Output::class, 'registration_id', 'id');
    }
}
