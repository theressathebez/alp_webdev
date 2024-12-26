<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    public $timestamps = false;
    

    protected $fillable = [
        'result_name',
        'prizes'
    ];

    public function outputs()
    {
        return $this->hasMany(Output::class);
    }
}
