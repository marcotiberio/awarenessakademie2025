<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'workshopMeta',
        'title' => 'Main Content',
        'style' => '',
        'menu_order' => 1,
        'position' => 'acf_after_title',
        'fields' => [
            // [
            //     'label' => __('Info', 'flynt'),
            //     'name' => 'infoTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0,
            // ],
            [
                'label' => __('Main text', 'flynt'),
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
                'label' => __('Social Media', 'flynt'),
                'name' => 'socialmediaTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Social Media', 'flynt'),
                'name' => 'socialmediaRepeater',
                'type' => 'repeater',
                'layout' => 'block',
                'min' => 1,
                'button_label' => __('Add Social Media', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'socialmediaTitle',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => 50
                        ]
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'socialmediaLink',
                        'type' => 'url',
                        'wrapper' => [
                            'width' => 50
                        ]
                    ],
                ],
            ],
            [
                'label' => __('Booking', 'flynt'),
                'name' => 'bookingTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Booking', 'flynt'),
                'name' => 'contactForm',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 0
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Page Background', 'flynt'),
                'name' => 'pageBackground',
                'type' => 'color_picker',
                'default' => '#000',
                'required' => 1
            ],
            [
                'label' => __('Shape', 'flynt'),
                'name' => 'shapeMask',
                'type' => 'button_group',
                'choices' => [
                    'none' => sprintf('<p>None</p>', __('None', 'flynt')),
                    '1' => sprintf('<p>1</p>', __('1', 'flynt')),
                    '2' => sprintf('<p>2</p>', __('2', 'flynt')),
                    '3' => sprintf('<p>3</p>', __('3', 'flynt')),
                    '4' => sprintf('<p>4</p>', __('4', 'flynt')),
                ],
                'default_value' => 'None',
                'wrapper' => [
                    'width' => 100,
                ]
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'workshop',
                ],
            ],
        ],
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'workshopComponents',
        'title' => __('Workshop Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'workshopComponents',
                'label' => __('Workshop Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    // Components\BlockPostDescription\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'workshop',
                ],
            ],
        ],
    ]);
});
