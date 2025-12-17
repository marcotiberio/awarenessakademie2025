<?php

namespace Flynt\Components\ListingPastWorkshops;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'workshop';

add_filter('Flynt/addComponentData?name=ListingPastWorkshops', function ($data) {
    $postType = POST_TYPE;

    $today = date('Ymd');

    $data['posts'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'meta_key' => 'end_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'update_post_meta_cache' => true, // Optimize meta queries
        'update_post_term_cache' => true, // Optimize term queries to prevent N+1
        'meta_query' => array(
            'relation'    => 'AND',
            array(
                'key' => 'start_date',
                'compare' => '<',
                'value' => $today,
            ),
            array(
                'key' => 'end_date',
                'compare' => '<',
                'value' => $today,
            ),
        ),
    ]);

    $data['postTypeArchiveLink'] = get_post_type_archive_link($postType);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ListingPastWorkshops',
        'label' => __('Listing: Past Workshops', 'flynt'),
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
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'text',
            ],
            [
                'label' => __('Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'imageDivider',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 50,
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

Options::addTranslatable('ListingPastWorkshops', [
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
                'label' => __('Title', 'flynt'),
                'name' => 'blockTitle',
                'type' => 'text',
                'default_value' => __('Vergangene', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => __('Read More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => __('Mehr Erfahren', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => __('Coming Soon', 'flynt'),
                'name' => 'comingSoon',
                'type' => 'text',
                'default_value' => __('Weitere Beiträge folgen in Kürze', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ]
        ],
    ]
]);
