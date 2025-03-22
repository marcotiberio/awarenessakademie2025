<?php

namespace Flynt\Components\BlockBanner;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

function getACFLayout()
{
    return [
        'name' => 'BlockBanner',
        'label' =>  __('Block: Banner', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            // [
            //     'label' => __('Title', 'flynt'),
            //     'name' => 'blockTitle',
            //     'type' => 'wysiwyg',
            //     'tabs' => 'visual,text',
            //     'media_upload' => 0,
            //     'delay' => 1,
            // ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLink',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 100
                ],
            ],
            // [
            //     'label' => __('Multimedia', 'flynt'),
            //     'name' => 'multimediaTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Here you can choose to add either a background image, video or color.', 'flynt'),
            //     'name' => 'message',
            //     'type' => 'message',
            //     'message' => '',
            //     'new_lines' => 'wpautop',
            //     'esc_html' => 1
            // ],
            // [
            //     'label' => __('Background Overlay', 'flynt'),
            //     'instructions' => __('Add overlay to the background', 'flynt'),
            //     'name' => 'bgOverlay',
            //     'type' => 'true_false',
            //     'ui' => 1,
            //     'ui_on_text' => 'Yes',
            //     'ui_off_text' => 'No',
            //     'default_value' => 0,
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
            // ],
            // [
            //     'label' => __('Image', 'flynt'),
            //     'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
            //     'name' => 'image',
            //     'type' => 'image',
            //     'preview_size' => 'medium',
            //     'required' => 0,
            //     'mime_types' => 'jpg,jpeg,png,svg',
            //     'wrapper' =>  [
            //         'width' => 50,
            //     ],
            // ],
            // [
            //     'label' => __('Image Mobile', 'flynt'),
            //     'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
            //     'name' => 'imageMobile',
            //     'type' => 'image',
            //     'preview_size' => 'medium',
            //     'required' => 0,
            //     'mime_types' => 'jpg,jpeg,png,svg',
            //     'wrapper' =>  [
            //         'width' => 50,
            //     ],
            // ],
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
                    FieldVariables\getColorBackground(),
                    FieldVariables\getColorText(),
                ]
            ]
        ]
    ];
}
