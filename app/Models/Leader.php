<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Leader extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
        'leader_name',
        'leader_email',
        'leader_phone',
        'leader_dob',
        'leader_location',
        'leader_password',
        'team_id'
    ];

    protected $hidden = [
        'leader_password',
    ];


    public function getAuthPassword()
    {
        return $this->leader_password;
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'leader_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
