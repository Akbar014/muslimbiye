<?php

return [
    'mode'                     => '',
    'format'                   => 'A4',
    'default_font_size'        => '11',
    'default_font'             => 'notosansbn',
    'margin_left'              => 0,
    'margin_right'             => 0,
    'margin_top'               => 0,
    'margin_bottom'            => 0,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Biodata',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'sans-serif',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => '',
    'custom_font_data'         => [],
    'auto_language_detection'  => false,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
    'custom_font_dir'  => base_path('assets/fonts/fonts/pdf/'),
    'custom_font_data' => [
        'notosansbn' => [ // must be lowercase and snake_case
            'R'  => 'noto_sans_bangali-regular.ttf',    // regular font
            'B'  => 'noto_sans_bangali-bold.ttf',       // optional: bold font
            'I'  => 'noto_sans_bangali-regular.ttf',     // optional: italic font
            'BI' => 'noto_sans_bangali-bold.ttf' // optional: bold-italic font
        ],
        'kalpurush'=> [
            'R'=>'kalpurush.ttf'
        ],
        'nikosh' => [
            'R'  => 'nikosh.ttf', // regular font
            'B'  => 'nikosh.ttf', // optional: bold font
            'I'  => 'nikosh.ttf', // optional: italic font
            'BI' => 'nikosh.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,   
            'useKashida' => 75, 
        ]
        // ...add as many as you want.
    ],
];
