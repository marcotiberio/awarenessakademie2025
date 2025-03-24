<?php

namespace Flynt\Components\ListingNetwork;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'netzwerk';

add_filter('Flynt/addComponentData?name=ListingNetwork', function ($data) {
    $postType = POST_TYPE;
    $data['taxonomies'] = $data['taxonomies'] ?? [];

    $data['posts'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        // 'category' => join(',', array_map(function ($taxonomy) {
        //     return $taxonomy->term_id;
        // }, $data['taxonomies'])),
        'tax_query' => array(
        array (
                'taxonomy' => 'network-category',
                'field' => 'slug',
                'terms' => $data['taxonomies'],
            )
        ),
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ListingNetwork',
        'label' => 'Listing: Network',
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
                'name' => 'blockTitle',
                'type' => 'text',
                'required' => 1,
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => __('Categories', 'flynt'),
                'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
                'name' => 'taxonomies',
                'type' => 'taxonomy',
                'taxonomy' => 'network-category',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'multiple' => 1,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object'
            ],
        ],
    ];
}
