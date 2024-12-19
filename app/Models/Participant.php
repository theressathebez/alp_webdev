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
        'paricipant_location',
        'participant_email',
        'participant_phone',
        'participant_password'
    ];
}
