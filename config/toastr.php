<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

return array(
    /*
    |--------------------------------------------------------------------------
    | Toastr options
    |--------------------------------------------------------------------------
    |
    | Here you can specify the options that will be passed to the toastr.js
    | library. For a full list of options, visit the documentation.
    |
    | Example:
    | 'options' => [
    |     'closeButton' => true,
    |     'debug' => false,
    |     'newestOnTop' => false,
    |     'progressBar' => true,
    | ],
    */

    'options' => array(
        'closeButton'       => env('TOASTR_CLOSE_BUTTON', true),
        'closeDuration'     => env('TOASTR_CLOSE_DURATION', 300),
        'closeEasing'       => env('TOASTR_CLOSE_EASING', 'swing'),
        'closeMethod'       => env('TOASTR_CLOSE_METHOD', 'fadeOut'),
        'closeOnHover'      => env('TOASTR_CLOSE_ON_HOVER', true),
        'debug'             => env('TOASTR_DEBUG', false),
        'newestOnTop'       => env('TOASTR_NEWESTONTOP', false),
        'progressBar'       => env('TOASTR_PROGRESS_BAR', true),
        'rtl'               => env('TOASTR_RTL', false),
    ),
);
