<?php
/*
 * Set specific configuration variables here
 */
return [
    // Whether all characters supplied must be replaced with their closest ASCII counterparts
    'ascii'    => false,

    // Image shape: circle or square
    'shape' => 'circle',

    // Image width, in pixel
    'width'    => 250,

    // Image height, in pixel
    'height'   => 250,

    // Number of characters used as initials. If name consists of single word, the first N character will be used
    'chars'    => 2,

    // font size
    'fontSize' => 100,

    // Fonts used to render text.
    // If contains more than one fonts, randomly selected based on name supplied
    // You can provide absolute path, path relative to folder resources/laravolt/avatar/fonts/, or mixed.
    'fonts'    => ['OpenSans-Bold.ttf', 'rockwell.ttf'],

    // List of foreground colors to be used, randomly selected based on name supplied
    'foregrounds'   => [
        '#FFFFFF',
    ],

    // List of background colors to be used, randomly selected based on name supplied
    'backgrounds'   => [    
        '#ef9a9a',
        '#b71c1c',
        '#ba68c8',
        '#ea80fc',
        '#b388ff',
        '#00796b',
        '#01579b',
        '#827717',
        '#388e3c',
        '#ffc107',
        '#ffab40',
        '#795548',
        '#607d8b',
        '#b388ff',
        '#d50000',
        '#1b5e20',
        '#9e9d24',
        '#aeea00',
        '#eeff41',
        '#69f0ae',
        '#ffe57f',
        '#a1887f',
    ],

    'border'    => [
        'size'  => 0,

        // border color, available value are:
        // 'foreground' (same as foreground color)
        // 'background' (same as background color)
        // or any valid hex ('#aabbcc')
        'color' => 'foreground',
    ],
];
