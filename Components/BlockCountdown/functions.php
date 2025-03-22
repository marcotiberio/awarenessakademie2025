<?php

namespace Flynt\Components\BlockCountdown;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=BlockCountdown', function ($data) {
    $translatableOptions = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($translatableOptions, $data['options']),
    ];
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockCountdown',
        'label' => 'Countdown',
        'sub_fields' => [
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getColorBackground(),
                    FieldVariables\getColorText(),
                    [
                        'label' => __('Autoplay Speed (in milliseconds)', 'flynt'),
                        'instructions' => __('Default is 25000', 'flynt'),
                        'name' => 'autoplaySpeed',
                        'type' => 'number',
                        'min' => 0,
                        'step' => 1,
                        'default_value' => 25000,
                        'required' => 0,
                    ],
                    [
                        'label' => __('Autoplay Delay (in milliseconds)', 'flynt'),
                        'instructions' => __('Default is 0, set to 0 for infinite loop autoplay.', 'flynt'),
                        'name' => 'autoplayDelay',
                        'type' => 'number',
                        'min' => 0,
                        'step' => 1,
                        'default_value' => 0,
                        'required' => 0,
                    ],
                    // [
                    //     'label' => __('Ticker Speed (in milliseconds)', 'flynt'),
                    //     'instructions' => __('Higher the number the slower it gets.', 'flynt'),
                    //     'name' => 'autoplaySpeed',
                    //     'type' => 'number',
                    //     'min' => 0,
                    //     'step' => 1,
                    //     'default_value' => 120000,
                    //     'required' => 1,
                    //     'wrapper' => [
                    //         'width' => 50
                    //     ],
                    // ],
                    [
                        'label' => __('Read More', 'flynt'),
                        'name' => 'readMore',
                        'type' => 'text',
                        'default_value' => __('Read More', 'flynt'),
                        'required' => 0,
                        'wrapper' => [
                            'width' => 50
                        ],
                    ],
                ]
            ]
        ]
    ];
}

Options::addTranslatable('BlockTicker', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Read More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => __('Read More', 'flynt'),
                'required' => 0,
                'wrapper' => [
                    'width' => 100
                ],
            ],
        ],
    ]
]);
