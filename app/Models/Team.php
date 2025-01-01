<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable  = ['team_name', 'institution_id'];
    public $timestamps = false;

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id','id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'team_id', 'id');
    }

    public function leader()
    {
        return $this->hasOne(Leader::class);
    }
}
