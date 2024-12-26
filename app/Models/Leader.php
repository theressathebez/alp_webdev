<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
        'leader_name',
        'leader_email',
        'leader_phone',
        'leader_dob',
        'leader_location'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class, 'leader_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
