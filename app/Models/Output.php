<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  = [
       
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function result()
    {
        return $this->belongsTo(Result::class);
    }
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
