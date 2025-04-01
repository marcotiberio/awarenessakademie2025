<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'roundtableMeta',
        'title' => 'Main Content',
        'style' => '',
        'menu_order' => 1,
        'position' => 'acf_after_title',
        'fields' => [
            [
                'label' => __('Intro', 'flynt'),
                'name' => 'introTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Intro', 'flynt'),
                'name' => 'intro',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'media_upload' => 0,
                'delay' => 1,
                'wrapper' => [
                    'width' => 100,
                ]
            ],
            [
                'label' => __('Main Text', 'flynt'),
                'name' => 'maintextTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Main Text', 'flynt'),
                'name' => 'mainText',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'media_upload' => 0,
                'delay' => 1,
                'wrapper' => [
                    'width' => 100,
                ]
            ],
            [
                'label' => __('Date', 'flynt'),
                'name' => 'dateTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Date (Required)',
                'instructions' => '',
                'required' => 1,
                'name' => 'end_date',
                'type' => 'date_picker',
                'display_format' => 'F j, Y',
                'return_format' => 'Ymd',
                'first_day' => 1,
            ],
            [
                'label' => 'Start (Optional)',
                'instructions' => '',
                'name' => 'start_date',
                'type' => 'date_picker',
                'display_format' => 'F j, Y',
                'return_format' => 'Ymd',
                'first_day' => 1,
            ],
            [
                'label' => __('Ongoing?', 'flynt'),
                'name' => 'ongoing',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'roundtable',
                ],
            ],
        ],
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'roundtableComponents',
        'title' => __('Roundtable Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'roundtableComponents',
                'label' => __('Roundtable Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockPostDescription\getACFLayout(),
                    Components\BlockContactForm\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'roundtable',
                ],
            ],
        ],
    ]);
});
