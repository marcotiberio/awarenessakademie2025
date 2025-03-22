<?php

namespace Flynt\Components\BlockPostHeader;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockPostHeader', function ($data) {
    $data['dateFormat'] = get_option('date_format');
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'sliderImages',
        'label' => __('Slider: Images', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Product Images', 'flynt'),
                'name' => 'carouselTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Images', 'flynt'),
                'name' => 'imageFigure',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Image', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Image', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                        'name' => 'productImage',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'required' => 1,
                        'mime_types' => 'jpg,jpeg,png,svg',
                        'wrapper' =>  [
                            'width' => 50,
                        ],
                    ],
                ],
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
                        'label' => __('Enable Autoplay', 'flynt'),
                        'name' => 'autoplay',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                    [
                        'label' => __('Autoplay Speed (in milliseconds)', 'flynt'),
                        'name' => 'autoplaySpeed',
                        'type' => 'number',
                        'min' => 2000,
                        'step' => 1,
                        'default_value' => 4000,
                        'required' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'autoplay',
                                    'operator' => '==',
                                    'value' => 1
                                ]
                            ]
                        ],
                    ],
                ]
            ]
        ]
    ];
}

Options::addTranslatable('BlockPostHeader', [
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
                'label' => __('Material', 'flynt'),
                'name' => 'tableMaterial',
                'type' => 'text',
                'default_value' => __('Material', 'flynt'),
                'wrapper' => [
                    'width' => 25,
                ],
            ],
            [
                'label' => __('Softening Temperature', 'flynt'),
                'name' => 'tableSofteningTemperature',
                'type' => 'text',
                'default_value' => __('Softening Temperature', 'flynt'),
                'wrapper' => [
                    'width' => 25
                ]
            ],
            [
                'label' => __('Impact Strength', 'flynt'),
                'name' => 'tableImpactStrength',
                'type' => 'text',
                'default_value' => __('Impact Strength', 'flynt'),
                'wrapper' => [
                    'width' => 25
                ]
            ],
            [
                'label' => __('Tensile Strength', 'flynt'),
                'name' => 'tableTensileStrength',
                'type' => 'text',
                'default_value' => __('Tensile Strength', 'flynt'),
                'wrapper' => [
                    'width' => 25
                ]
            ],
            [
                'label' => __('Colors', 'flynt'),
                'name' => 'tableColors',
                'type' => 'text',
                'default_value' => __('Colors', 'flynt'),
                'wrapper' => [
                    'width' => 25
                ]
            ],
        ],
    ],
]);
