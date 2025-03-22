<?php

namespace Flynt\Components\HeroMultimediaComplex;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

function getACFLayout()
{
    return [
        'name' => 'HeroMultimediaComplex',
        'label' =>  __('Hero Multimedia Complex', 'flynt'),
        'sub_fields' => [
            // [
            //     'label' => __('General', 'flynt'),
            //     'name' => 'generalTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Text Alignment', 'flynt'),
            //     'name' => 'textAlignment',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'items-start' => sprintf('<i class=\'dashicons dashicons-arrow-up-alt\' title=\'%1$s\'></i>', __('Top', 'flynt')),
            //         'items-center' => sprintf('<i class=\'dashicons dashicons-minus\' title=\'%1$s\'></i>', __('Top', 'flynt')),
            //         'items-end' => sprintf('<i class=\'dashicons dashicons-arrow-down-alt\' title=\'%1$s\'></i>', __('Bottom', 'flynt')),

            //     ],
            //     'default_value' => 'items-center',
            //     'wrapper' => [
            //         'width' => 100,
            //     ],
            // ],
            // [
            //     'label' => __('Subtitle', 'flynt'),
            //     'name' => 'blockSubtitle',
            //     'type' => 'text',
            // ],
            // [
            //     'label' => __('Title', 'flynt'),
            //     'name' => 'blockTitle',
            //     'type' => 'wysiwyg',
            //     'tabs' => 'visual,text',
            //     'media_upload' => 0,
            //     'delay' => 1,
            // ],
            [
                'label' => __('Multimedia', 'flynt'),
                'name' => 'multimediaTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Here you can choose to add either a background image, video or color.', 'flynt'),
                'name' => 'message',
                'type' => 'message',
                'message' => '',
                'new_lines' => 'wpautop',
                'esc_html' => 1
            ],
            // [
            //     'label' => __('Background Overlay', 'flynt'),
            //     'instructions' => __('Add overlay to the background', 'flynt'),
            //     'name' => 'bgOverlay',
            //     'type' => 'true_false',
            //     'ui' => 1,
            //     'ui_on_text' => 'Yes',
            //     'ui_off_text' => 'No',
            //     'default_value' => 1,
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
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
                    'width' => 33,
                ],
            ],
            [
                'label' => __('Image 2', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'image2',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 33,
                ],
            ],
            [
                'label' => __('Image 3', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'image3',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 33,
                ],
            ],
            [
                'label' => __('Image Mobile', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'imageMobile',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 33,
                ],
            ],
            [
                'label' => __('Image Mobile', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'imageMobile2',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 33,
                ],
            ],
            [
                'label' => __('Image Mobile', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'imageMobile3',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 33,
                ],
            ],
            // [
            //     'label' => __('Video', 'flynt'),
            //     'instructions' => __('Video-Format: mp4', 'flynt'),
            //     'name' => 'videoFile',
            //     'type' => 'file',
            //     'return_format' => 'url',
            //     'max_size' => 20,
            //     'mime_types' => 'mp4',
            //     'wrapper' => [
            //         'width' => 50,
            //     ]
            // ],
            // [
            //     'label' => __('Video Mobile', 'flynt'),
            //     'instructions' => __('Video-Format: mp4', 'flynt'),
            //     'name' => 'videoFileMobile',
            //     'type' => 'file',
            //     'return_format' => 'url',
            //     'mime_types' => 'mp4',
            //     'wrapper' => [
            //         'width' => 50,
            //     ]
            // ],
            // [
            //     'label' => __('Color', 'flynt'),
            //     'name' => 'color',
            //     'type' => 'color_picker',
            //     'wrapper' => [
            //         'width' => 100,
            //     ],
            // ],
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
                    FieldVariables\getColorText(),
                ]
            ]
        ]
    ];
}
