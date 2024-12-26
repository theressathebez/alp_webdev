<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['institution_name', 'institution_location'];

    public function teams()
    {
        return $this->hasMany(Team::class, 'institution_id', 'id');
    }
}
