<?php

namespace Flynt\Components\ListingPastRoundtables;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'roundtable';

add_filter('Flynt/addComponentData?name=ListingPastRoundtables', function ($data) {
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
        'name' => 'ListingPastRoundtables',
        'label' => __('Listing: Past Roundtablests', 'flynt'),
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

Options::addTranslatable('ListingPastRoundtables', [
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
                'label' => __('Read More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => __('Mehr Erfahren', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ]
        ],
    ]
]);
