<?php

namespace Flynt\Components\BannerImageText;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BannerImageText',
        'label' => __('Banner Image/Text', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png,svg'
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'contentTitle',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => __('Title Position', 'flynt'),
                'name' => 'titlePosition',
                'type' => 'button_group',
                'choices' => [
                    'topLeft' => sprintf('<p>TOP LEFT</p>', __('Top-Left', 'flynt')),
                    'topRight' => sprintf('<p>TOP RIGHT</p>', __('Top-Right', 'flynt')),
                    'bottomLeft' => sprintf('<p>BOTTOM LEFT</p>', __('Bottom-Left', 'flynt')),
                    'bottomRight' => sprintf('<p>BOTTOM RIGHT</p>', __('Bottom-Right', 'flynt'))
                ]
            ]
        ]
    ];
}
