<?php
return [
    'defaults' => [
        'guard' => 'leader',  // Set 'leader' as the default guard
        'passwords' => 'leaders', // Set 'leaders' as the default password broker
    ],

    // Guards Section (Only 'leader')
    'guards' => [
        'leader' => [
            'driver' => 'session',
            'provider' => 'leaders',
        ],
    ],

    // Providers Section (Only for 'Leader' model)
    'providers' => [
        'leaders' => [
            'driver' => 'eloquent',
            'model' => App\Models\Leader::class,
        ],
    ],

    // Password Resets (Only for 'Leader')
    'passwords' => [
        'leaders' => [
            'provider' => 'leaders',
            'table' => 'password_reset_tokens',
            'expire' => 60, 
            'throttle' => 60,
        ],
    ],

    // Password Timeout for Confirming Passwords
    'password_timeout' => 10800,  // 3 hours timeout
];


