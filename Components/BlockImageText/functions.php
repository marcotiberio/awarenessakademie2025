<?php

namespace Flynt\Components\BlockImageText;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'BlockImageText',
        'label' => __('Block: Image Text', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image Position', 'flynt'),
                'name' => 'imagePosition',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Image on the left', 'flynt')),
                    'right' => sprintf('<i class=\'dashicons dashicons-align-right\' title=\'%1$s\'></i>', __('Image on the right', 'flynt'))
                ],
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => __('Image Width', 'flynt'),
                'name' => 'imageWidth',
                'type' => 'button_group',
                'choices' => [
                    'w-full' => sprintf('<p>2 Columns</p>', __('2 Columns', 'flynt')),
                    'w-1/2' => sprintf('<p>1 Column</p>', __('1 Column', 'flynt')),
                ],
                'default_value' => 'justify-center',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            // [
            //     'label' => __('Image Vertical Alignment', 'flynt'),
            //     'name' => 'imageYAlignment',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'items-start' => sprintf('<i class=\'dashicons dashicons-arrow-up-alt\' title=\'%1$s\'></i>', __('Image top', 'flynt')),
            //         'items-center' => sprintf('<i class=\'dashicons dashicons-align-center\' title=\'%1$s\'></i>', __('Image center', 'flynt')),
            //         'items-end' => sprintf('<i class=\'dashicons dashicons-arrow-down-alt\' title=\'%1$s\'></i>', __('Image bottom', 'flynt'))
            //     ],
            //     'default_value' => 'center',
            //     'wrapper' => [
            //         'width' => 25
            //     ],
            // ],
            // [
            //     'label' => __('Image Horizontal Alignment', 'flynt'),
            //     'name' => 'imageXAlignment',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'justify-start' => sprintf('<i class=\'dashicons dashicons-arrow-left-alt\' title=\'%1$s\'></i>', __('Image left', 'flynt')),
            //         'justify-center' => sprintf('<i class=\'dashicons dashicons-align-center\' title=\'%1$s\'></i>', __('Image center', 'flynt')),
            //         'justify-end' => sprintf('<i class=\'dashicons dashicons-arrow-right-alt\' title=\'%1$s\'></i>', __('Image right', 'flynt'))
            //     ],
            //     'default_value' => 'justify-center',
            //     'wrapper' => [
            //         'width' => 25
            //     ],
            // ],
            // [
            //     'label' => __('Image Size', 'flynt'),
            //     'name' => 'imageSize',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'cover' => sprintf('<i class=\'dashicons dashicons-editor-expand\' title=\'%1$s\'></i>', __('Cover', 'flynt')),
            //         'contain' => sprintf('<i class=\'dashicons dashicons-editor-contract\' title=\'%1$s\'></i>', __('Contain', 'flynt'))
            //     ],
            //     'default_value' => 'cover',
            //     'wrapper' => [
            //         'width' => 25
            //     ],
            // ],
            [
                'label' => __('Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Text Width', 'flynt'),
                'name' => 'textWidth',
                'type' => 'button_group',
                'choices' => [
                    'w-full' => sprintf('<p>2 Columns</p>', __('2 Columns', 'flynt')),
                    'w-1/2' => sprintf('<p>1 Column</p>', __('1 Column', 'flynt')),
                ],
                'default_value' => 'justify-center',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Text', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 0,
                'wrapper' =>  [
                    'width' => 50,
                ],
            ],
            // [
            //     'label' => __('Text Horizontal Alignment', 'flynt'),
            //     'name' => 'textXAlignment',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'justify-start' => sprintf('<i class=\'dashicons dashicons-arrow-left-alt\' title=\'%1$s\'></i>', __('Image left', 'flynt')),
            //         'justify-center' => sprintf('<i class=\'dashicons dashicons-align-center\' title=\'%1$s\'></i>', __('Image center', 'flynt')),
            //         'justify-end' => sprintf('<i class=\'dashicons dashicons-arrow-right-alt\' title=\'%1$s\'></i>', __('Image right', 'flynt'))
            //     ],
            //     'default_value' => 'justify-center',
            //     'wrapper' => [
            //         'width' => 50
            //     ],
            // ],
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
                    FieldVariables\getColorBackground(),
                    FieldVariables\getColorText(),
                ]
            ]
        ]
    ];
}
