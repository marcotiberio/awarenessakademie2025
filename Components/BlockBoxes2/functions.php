<?php

namespace Flynt\Components\BlockBoxes2;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'glossar-term';

add_filter('Flynt/addComponentData?name=BlockBoxes2', function ($data) {
    $postType = POST_TYPE;

    $data['posts'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        'posts_per_page' => 1,
        'orderby' => 'rand',
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockBoxes2',
        'label' => 'Boxes (x2)',
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
                'name' => 'boxTitleLeft',
                'type' => 'text'
            ],
            [
                'label' => __('Text', 'flynt'),
                'name' => 'contentHtmlLeft',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 0,
                'wrapper' => [
                    'width' => 75
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLinkLeft',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 25
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
                'name' => 'boxTitleRight',
                'type' => 'text'
            ],
            [
                'label' => __('Feeling lucky?', 'flynt'),
                'instructions' => __('Select if you want to display a random term of the glossar!', 'flynt'),
                'name' => 'showRandomPost',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1
            ],
            [
                'label' => __('Text', 'flynt'),
                'name' => 'contentHtmlRight',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 0,
                'wrapper' => [
                    'width' => 75
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'buttonLinkRight',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 25
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

Options::addTranslatable('BlockBoxes2', [
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
                'label' => __('Glossar Button', 'flynt'),
                'name' => 'glossarButtonLink',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => __('Glossar Box Title', 'flynt'),
                'name' => 'glossarBoxTitle',
                'type' => 'text',
                'default_value' => __('Glossar', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ]
        ],
    ]
]);
