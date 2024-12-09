<?php

return [
    'database' => [
        'driver' => 'sqlite',
        'database' => base_path('database/db.sqlite'),
    ],

    'security' => [
        'first_key' => env('ENCRYPT_FIRST_KEY', base64_encode('AdrianoManfron')),
        'second_key' => env('ENCRYPT_SECOND_KEY', base64_decode('AdrianoManfron1010')),
    ],
];
