<?php

return [

    /*
|--------------------------------------------------------------------------
| Authentication Defaults
|--------------------------------------------------------------------------
*/
    'defaults' => [ // what is this default means?
        'guard' => 'api', // the web value is refer to?
        'passwords' => 'users', // is this referring to users profiders? or users model? how it's linked with its class?
        'hash' => false,
    ],

    /*
|--------------------------------------------------------------------------
| Authentication Guards
|--------------------------------------------------------------------------
*/
    'guards' => [ // what is this?
        'web' => [ // is this linked with " 'guard' => 'web' " above?
            'driver' => 'session', // which driver it is?
            'provider' => 'users', // where is users provider? i can't find it in config/app.php
        ],

        'api' => [ // what's the different with 'web' ?
            'driver' => 'token', // where is this driver?
            'provider' => 'users', // where is users provider? i can't find it in config/app.php
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

];
