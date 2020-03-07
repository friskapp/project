<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admins ( Administrators )
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default admins by their email
    |
    */

    'admins' => [],


    /*
    |--------------------------------------------------------------------------
    | Thumbnails
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default sizes of created thumbnails
    |
    */
    'thumbnails' => [
        'small' => [50, 50],
        'medium' => [100, 100],
        'large' => [250, 250],
    ],

    
    /*
    |--------------------------------------------------------------------------
    | Flood Control
    |--------------------------------------------------------------------------
    |
    | Here you may specify the seconds if flood control is enabled to throttle
    | insertion of new sessions, and between similar sessions.
    */
    'flood_control' => [
        'new_sessions' => 20,
        'similar_sessions' => 60,
    ],

    /*
    |--------------------------------------------------------------------------
    | Insights Finder
    |--------------------------------------------------------------------------
    |
    | If an error comes without a solution, insights finder will try to find a
    | a solution for common errors. Please notice, this runs hourly as a command.
    */
    'insights_finder' => true,
];
