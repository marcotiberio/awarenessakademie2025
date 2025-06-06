<?php

namespace Flynt\Components\ListingFeatNews;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'news';

add_filter('Flynt/addComponentData?name=ListingFeatNews', function ($data) {
    $postType = POST_TYPE;
    $data['taxonomies'] = $data['taxonomies'] ?? [];

    $data['posts'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        'category' => join(',', array_map(function ($taxonomy) {
            return $taxonomy->term_id;
        }, $data['taxonomies'])),
        'ignore_sticky_posts' => 1,
        'posts_per_page' => 3,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ListingFeatNews',
        'label' => 'Listing: Featured News',
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
                'label' => __('Categories', 'flynt'),
                'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
                'name' => 'taxonomies',
                'type' => 'taxonomy',
                'taxonomy' => 'category',
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
