<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
        'participant_name',
        'participant_dob',
        'participant_location',
        'participant_email',
        'participant_phone',
        'participant_password',
        'leader_id',
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class, 'leader_id', 'id');
    }
}
