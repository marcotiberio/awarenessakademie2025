<?php

namespace Flynt\Components\GridLogos;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'GridLogos',
        'label' => __('Grid: Logos', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'blockTitle',
                'type' => 'text'
            ],
            [
                'label' => __('Logos', 'flynt'),
                'name' => 'logos',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => __('Add Logo', 'flynt'),
                'min' => 1,
                'sub_fields' => [
                    [
                        'label' => __('Logo', 'flynt'),
                        'instructions' => __('Accepted Image-Formats: SVG, PNG. Recommended Image-Format: SVG.', 'flynt'),
                        'name' => 'logo',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'svg,png',
                        'wrapper' => [
                            'width' => 50
                        ],
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'logoLink',
                        'type' => 'url',
                        'wrapper' => [
                            'width' => 50
                        ],
                    ],
                ]
            ],
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
                    [
                        'label' => __('Number of columns', 'flynt'),
                        'name' => 'gridColumns',
                        'type' => 'button_group',
                        'choices' => [
                            '3' => sprintf('<p>3</p>', __('3', 'flynt')),
                            '4' => sprintf('<p>4</p>', __('4', 'flynt')),
                            '5' => sprintf('<p>5</p>', __('5', 'flynt')),
                            '6' => sprintf('<p>6</p>', __('6', 'flynt')),
                            '7' => sprintf('<p>7</p>', __('7', 'flynt'))
                        ],
                        'default_value' => '7',
                    ],
                    FieldVariables\getColorBackground(),
                    FieldVariables\getColorText(),
                ]
            ]
        ]
    ];
}
