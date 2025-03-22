<?php

namespace Flynt\Components\BlockImageTextNew;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'BlockImageTextNew',
        'label' => __('Block: Image Text (Repeater)', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Geneeral', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image/Text', 'flynt'),
                'name' => 'repeaterImageText',
                'type' => 'repeater',
                'layout' => 'block',
                'min' => 1,
                'max' => 2,
                'button_label' => __('Add Element', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Image starts in column:', 'flynt'),
                        'name' => 'imageColStart',
                        'type' => 'button_group',
                        'choices' => [
                            'col-start-1 lg:col-start-1' => sprintf('<p>1</p>', __('1', 'flynt')),
                            'col-start-1 lg:col-start-2' => sprintf('<p>2</p>', __('2', 'flynt')),
                            'col-start-1 lg:col-start-3' => sprintf('<p>3</p>', __('3', 'flynt')),
                            'col-start-1 lg:col-start-4' => sprintf('<p>4</p>', __('4', 'flynt'))
                        ],
                        'wrapper' => [
                            'width' => 15
                        ],
                    ],
                    [
                        'label' => __('Image ends in column:', 'flynt'),
                        'name' => 'imageColEnd',
                        'type' => 'button_group',
                        'choices' => [
                            'col-end-4 lg:col-end-1' => sprintf('<p>1</p>', __('1', 'flynt')),
                            'col-end-4 lg:col-end-2' => sprintf('<p>2</p>', __('2', 'flynt')),
                            'col-end-4 lg:col-end-3' => sprintf('<p>3</p>', __('3', 'flynt')),
                            'col-end-4 lg:col-end-4' => sprintf('<p>4</p>', __('4', 'flynt'))
                        ],
                        'wrapper' => [
                            'width' => 15
                        ],
                    ],
                    [
                        'label' => __('Image', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                        'name' => 'itemImage',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'required' => 0,
                        'mime_types' => 'jpg,jpeg,png,svg',
                        'wrapper' =>  [
                            'width' => 70,
                        ],
                    ],
                    [
                        'label' => __('Text starts in column:', 'flynt'),
                        'name' => 'textColStart',
                        'type' => 'button_group',
                        'choices' => [
                            'col-start-1 lg:col-start-1' => sprintf('<p>1</p>', __('1', 'flynt')),
                            'col-start-1 lg:col-start-2' => sprintf('<p>2</p>', __('2', 'flynt')),
                            'col-start-1 lg:col-start-3' => sprintf('<p>3</p>', __('3', 'flynt')),
                            'col-start-1 lg:col-start-4' => sprintf('<p>4</p>', __('4', 'flynt'))
                        ],
                        'wrapper' => [
                            'width' => 15
                        ],
                    ],
                    [
                        'label' => __('Text ends in column:', 'flynt'),
                        'name' => 'textColEnd',
                        'type' => 'button_group',
                        'choices' => [
                            'col-end-4 lg:col-end-1' => sprintf('<p>1</p>', __('1', 'flynt')),
                            'col-end-4 lg:col-end-2' => sprintf('<p>2</p>', __('2', 'flynt')),
                            'col-end-4 lg:col-end-3' => sprintf('<p>3</p>', __('3', 'flynt')),
                            'col-end-4 lg:col-end-4' => sprintf('<p>4</p>', __('4', 'flynt'))
                        ],
                        'wrapper' => [
                            'width' => 15
                        ],
                    ],
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'itemTextHtml',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'media_upload' => 0,
                        'delay' => 1,
                        'wrapper' =>  [
                            'width' => 40,
                        ],
                    ],
                    [
                        'label' => __('Buttons', 'flynt'),
                        'name' => 'repeaterButtons',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => __('Add Button', 'flynt'),
                        'sub_fields' => [
                            [
                                'label' => __('Button', 'flynt'),
                                'name' => 'linkButton',
                                'type' => 'link',
                                'return_format' => 'array',
                                'required' => 0,
                                'wrapper' => [
                                    'width' => 100
                                ],
                            ],
                        ],
                        'wrapper' =>  [
                            'width' => 30,
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
                    FieldVariables\getColorBackground(),
                    FieldVariables\getColorText(),
                ]
            ]
        ]
    ];
}
