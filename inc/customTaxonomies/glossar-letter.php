<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Flynt\CustomTaxonomies;

function registerGlossarLetterTaxonomy()
{
    $labels = [
        'name'                       => _x('Letters', 'Taxonomy General Name', 'flynt'),
        'singular_name'              => _x('Letter', 'Taxonomy Singular Name', 'flynt'),
        'menu_name'                  => __('Letters', 'flynt'),
        'all_items'                  => __('All Items', 'flynt'),
        'parent_item'                => __('Parent Item', 'flynt'),
        'parent_item_colon'          => __('Parent Item:', 'flynt'),
        'new_item_name'              => __('New Item Name', 'flynt'),
        'add_new_item'               => __('Add New Item', 'flynt'),
        'edit_item'                  => __('Edit Item', 'flynt'),
        'update_item'                => __('Update Item', 'flynt'),
        'view_item'                  => __('View Item', 'flynt'),
        'separate_items_with_commas' => __('Separate items with commas', 'flynt'),
        'add_or_remove_items'        => __('Add or remove items', 'flynt'),
        'choose_from_most_used'      => __('Choose from the most used', 'flynt'),
        'popular_items'              => __('Popular Items', 'flynt'),
        'search_items'               => __('Search Items', 'flynt'),
        'not_found'                  => __('Not Found', 'flynt'),
        'no_terms'                   => __('No items', 'flynt'),
        'items_list'                 => __('Items list', 'flynt'),
        'items_list_navigation'      => __('Items list navigation', 'flynt'),
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => false,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    ];

    register_taxonomy('glossar-letter', ['glossar-term'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerGlossarLetterTaxonomy');
