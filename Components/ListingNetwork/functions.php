<?php

namespace Flynt\Components\ListingNetwork;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'netzwerk-partner';

add_filter('Flynt/addComponentData?name=ListingNetwork', function ($data) {
    $postType = POST_TYPE;
    $data['taxonomies'] = $data['taxonomies'] ?? [];

    // Set blockTitle to the selected taxonomy term name if only one is selected
    if (isset($data['taxonomies']) && is_array($data['taxonomies']) && count($data['taxonomies']) === 1) {
        $term = get_term_by('slug', $data['taxonomies'][0], 'network-category');
        if ($term && !is_wp_error($term)) {
            $data['blockTitle'] = $term->name;
        }
    }
    // else: keep blockTitle as set by ACF or fallback

    $slugs = array_map(function($term) {
        return is_object($term) ? $term->slug : $term;
    }, $data['taxonomies']);
    error_log('Network slugs: ' . print_r($slugs, true));

    $args = [
        'post_status' => 'publish',
        'post_type' => $postType,
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'update_post_meta_cache' => true, // Optimize meta queries
        'update_post_term_cache' => true, // Optimize term queries to prevent N+1
    ];

    if (!empty($slugs)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'network-category',
                'field' => 'slug',
                'terms' => $slugs,
            ]
        ];
    }

    $data['posts'] = Timber::get_posts($args);

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
                'label' => __('The title of the block will be the selected category name.', 'flynt'),
                'name' => 'message',
                'type' => 'message',
                'message' => '',
                'new_lines' => 'wpautop',
                'esc_html' => 1
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
