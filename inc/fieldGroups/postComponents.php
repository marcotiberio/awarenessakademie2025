<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'postMeta',
        'title' => 'Main Content',
        'style' => '',
        'menu_order' => 1,
        'position' => 'acf_after_title',
        'fields' => [
            [
                'label' => __('Info', 'flynt'),
                'name' => 'infoTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            // [
            //     'label' => __('Color Background', 'flynt'),
            //     'name' => 'colorBackground',
            //     'type' => 'color_picker',
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
            // ],
            // [
            //     'label' => 'Date (Required)',
            //     'instructions' => '',
            //     'required' => 1,
            //     'name' => 'end_date',
            //     'type' => 'date_picker',
            //     'display_format' => 'F j, Y',
            //     'return_format' => 'Ymd',
            //     'first_day' => 1,
            // ],
            // [
            //     'label' => 'Start (Optional)',
            //     'instructions' => '',
            //     'name' => 'start_date',
            //     'type' => 'date_picker',
            //     'display_format' => 'F j, Y',
            //     'return_format' => 'Ymd',
            //     'first_day' => 1,
            // ],
            // [
            //     'label' => 'Where',
            //     'name' => 'postWhere',
            //     'type' => 'text',
            //     'wrapper' => [
            //         'width' => '50',
            //     ]
            // ],
            // [
            //     'label' => 'What',
            //     'name' => 'postWhat',
            //     'type' => 'text',
            //     'wrapper' => [
            //         'width' => '50',
            //     ]
            // ],
            // [
            //     'label' => __('Intro', 'flynt'),
            //     'name' => 'introTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0,
            // ],
            // [
            //     'label' => __('Intro', 'flynt'),
            //     'name' => 'intro',
            //     'type' => 'wysiwyg',
            //     'tabs' => 'visual',
            //     'media_upload' => 0,
            //     'delay' => 1,
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
            // ],
            // [
            //     'label' => __('Main text', 'flynt'),
            //     'name' => 'maintextTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0,
            // ],
            // [
            //     'label' => __('Main Text', 'flynt'),
            //     'name' => 'mainText',
            //     'type' => 'wysiwyg',
            //     'tabs' => 'visual',
            //     'media_upload' => 0,
            //     'delay' => 1,
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
            // ],
            // [
            //     'label' => __('Social Media', 'flynt'),
            //     'name' => 'socialmediaTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Social Media', 'flynt'),
            //     'name' => 'socialmediaRepeater',
            //     'type' => 'repeater',
            //     'layout' => 'block',
            //     'min' => 1,
            //     'button_label' => __('Add Social Media', 'flynt'),
            //     'sub_fields' => [
            //         [
            //             'label' => __('Title', 'flynt'),
            //             'name' => 'socialmediaTitle',
            //             'type' => 'text',
            //             'wrapper' => [
            //                 'width' => 50
            //             ]
            //         ],
            //         [
            //             'label' => __('Link', 'flynt'),
            //             'name' => 'socialmediaLink',
            //             'type' => 'url',
            //             'wrapper' => [
            //                 'width' => 50
            //             ]
            //         ],
            //     ],
            // ],
            // [
            //     'label' => __('Tickets', 'flynt'),
            //     'name' => 'ticketsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Tickets', 'flynt'),
            //     'name' => 'ticketsEmbed',
            //     'type' => 'textarea',
            // ],
            // [
            //     'label' => __('Options', 'flynt'),
            //     'name' => 'optionsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Page Background', 'flynt'),
            //     'name' => 'pageBackground',
            //     // 'type' => 'select',
            //     // 'allow_null' => 0,
            //     // 'multiple' => 0,
            //     // 'ui' => 0,
            //     // 'ajax' => 0,
            //     // 'choices' => [
            //     //     '#ffffffcc' => __('White', 'flynt'),
            //     //     '#49a3d5cc' => __('Blue', 'flynt'),
            //     //     '#f5cc5acc' => __('Yellow', 'flynt'),
            //     //     '#a76d61cc' => __('Red', 'flynt'),
            //     // ],
            //     // 'default_value' => 'white',
            //     'type' => 'color_picker',
            //     'default' => '#fff',
            //     'required' => 1
            // ],
            // [
            //     'label' => __('Shape', 'flynt'),
            //     'name' => 'shapeMask',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'none' => sprintf('<p>None</p>', __('None', 'flynt')),
            //         '1' => sprintf('<p>1</p>', __('1', 'flynt')),
            //         '2' => sprintf('<p>2</p>', __('2', 'flynt')),
            //         '3' => sprintf('<p>3</p>', __('3', 'flynt')),
            //         '4' => sprintf('<p>4</p>', __('4', 'flynt')),
            //     ],
            //     'default_value' => 'None',
            //     'wrapper' => [
            //         'width' => 100,
            //     ]
            // ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);
    // ACFComposer::registerFieldGroup([
    //     'name' => 'postComponents',
    //     'title' => __('Post Components', 'flynt'),
    //     'style' => 'seamless',
    //     'fields' => [
    //         [
    //             'name' => 'postComponents',
    //             'label' => __('Post Components', 'flynt'),
    //             'type' => 'flexible_content',
    //             'button_label' => __('Add Component', 'flynt'),
    //             'layouts' => [
    //                 // Components\BlockPostDescription\getACFLayout(),
    //             ],
    //         ],
    //     ],
    //     'location' => [
    //         [
    //             [
    //                 'param' => 'post_type',
    //                 'operator' => '==',
    //                 'value' => 'post',
    //             ],
    //         ],
    //     ],
    // ]);
});
