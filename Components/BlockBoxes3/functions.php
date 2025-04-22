<?php

namespace Flynt\Components\BlockBoxes3;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockBoxes3',
        'label' => 'Boxes (x3)',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'instructions' => __('Want to add a headline? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'blockTitle',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'label' => __('Left Box', 'flynt'),
                'name' => 'contentLeftBox',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'titleLeft',
                'type' => 'text',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLinkLeft',
                'type' => 'link',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Center Box', 'flynt'),
                'name' => 'contentCenterBox',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'titleCenter',
                'type' => 'text',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLinkCenter',
                'type' => 'link',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Right Box', 'flynt'),
                'name' => 'contentRightBox',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'titleRight',
                'type' => 'text',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLinkRight',
                'type' => 'link',
                'wrapper' => [
                    'width' => 50
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
