<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Competition extends Model
{
    use HasFactory;
    public $timestamps = false;

      
public function categories():HasMany{
    return $this->hasMany(Category::class);
}

public function countdown()
{
    $endDate = Carbon::parse($this->end_date);
    $now = Carbon::now();

    if ($endDate->isPast()) {
        return [
            'message' => "Competition ended!",
            'days' => 0,
            'hours' => 0,
            'minutes' => 0
        ];
    }

    $diff = $endDate->diff($now);

    return [
        'message' => "{$diff->days} days, {$diff->h} hours, {$diff->i} minutes remaining",
        'days' => $diff->days,
        'hours' => $diff->h,
        'minutes' => $diff->i
    ];
}


    protected $fillable  = [
        'competition_name',
        'start_date',
        'end_date',
        'registration_duedate',
        'registration_fee'
    ];
}
