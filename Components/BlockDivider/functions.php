<?php

namespace Flynt\Components\BlockDivider;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockDivider',
        'label' => __('Block: Divider', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Add an image to display an horizontal image divider.', 'flynt'),
                'name' => 'message',
                'type' => 'message',
                'message' => '',
                'new_lines' => 'wpautop',
                'esc_html' => 1
            ],
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
        ]
    ];
}
