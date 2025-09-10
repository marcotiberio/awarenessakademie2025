<?php

namespace Flynt\Components\ListingGlossar;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'glossar-term';

add_filter('Flynt/addComponentData?name=ListingGlossar', function ($data) {
    $postType = POST_TYPE;
    $data['taxonomies'] = $data['taxonomies'] ?? [];

    // Set blockTitle to the selected taxonomy term name if only one is selected
    if (isset($data['taxonomies']) && is_array($data['taxonomies']) && count($data['taxonomies']) === 1) {
        $term = get_term_by('slug', $data['taxonomies'][0], 'glossar-letter');
        if ($term && !is_wp_error($term)) {
            $data['blockTitle'] = $term->name;
        }
    }
    // else: keep blockTitle as set by ACF or fallback

    $data['posts'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        // 'category' => join(',', array_map(function ($taxonomy) {
        //     return $taxonomy->term_id;
        // }, $data['taxonomies'])),
        'tax_query' => array(
        array (
                'taxonomy' => 'glossar-letter',
                'field' => 'slug',
                'terms' => $data['taxonomies'],
            )
        ),
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ]);

    $data['selectedCategory'] = get_query_var('category_name');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ListingGlossar',
        'label' => 'Listing: Glossar',
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
                'taxonomy' => 'glossar-letter',
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
