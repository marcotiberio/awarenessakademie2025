<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'newsMeta',
        'title' => 'Main Content',
        'style' => '',
        'menu_order' => 1,
        'position' => 'acf_after_title',
        'fields' => [
            [
                'label' => __('Featured Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                'name' => 'imageFeat',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 0,
                'mime_types' => 'jpg,jpeg,png,svg',
                'wrapper' =>  [
                    'width' => 100,
                ],
            ],
            // [
            //     'label' => __('Info', 'flynt'),
            //     'name' => 'infoTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0,
            // ],
            // [
            //     'label' => __('Main text', 'flynt'),
            //     'name' => 'maintextTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0,
            // ],
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
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
                ],
            ],
        ],
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'newsComponents',
        'title' => __('News Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'newsComponents',
                'label' => __('News Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockBoxes2\getACFLayout(),
                    Components\BlockBoxes3\getACFLayout(),
                    Components\BlockContactForm\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
                ],
            ],
        ],
    ]);
});
