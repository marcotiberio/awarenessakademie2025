<?php

namespace Flynt\Components\NavigationFooter;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Flynt\FieldVariables;
use Flynt\Shortcodes;
use Flynt\ComponentManager;
use Timber\Timber;

add_action('init', function () {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function ($data) {
    $data['maxLevel'] = 0;
    $data['menu'] = Timber::get_menu('navigation_footer') ?? Timber::get_pages_menu();

    return $data;
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function ($data) {
    $componentManager = ComponentManager::getInstance();
    $componentPathFull = $componentManager->getComponentDirPath('NavigationFooter');
    $componentPath = str_replace(trailingslashit(get_template_directory()), '', $componentPathFull);

    if (!empty($data['social'])) {
        $data['social'] = array_map(function ($item) use ($componentPath) {
            $item['icon'] = Asset::getContents("{$componentPath}Assets/{$item['platform']['value']}.svg");
            return $item;
        }, $data['social']);
    }
    return $data;
});

Options::addTranslatable('NavigationFooter', [
    // [
    //     'label' => __('Logo', 'flynt'),
    //     'name' => 'logoTab',
    //     'type' => 'tab',
    //     'placement' => 'top',
    //     'endpoint' => 0
    // ],
    // [
    //     'label' => __('Logo', 'flynt'),
    //     'name' => 'logoFooter',
    //     'type' => 'image',
    //     'preview_size' => 'medium',
    //     'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
    //     'required' => 0,
    //     'mime_types' => 'jpg,jpeg,png,svg',
    //     'wrapper' =>  [
    //         'width' => 100,
    //     ]
    // ],
    [
        'label' => __('Left Column', 'flynt'),
        'name' => 'contentLeftTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
    ],
    // [
    //     'label' => __('Title', 'flynt'),
    //     'name' => 'blockTitleLeft',
    //     'type' => 'text',
    //     'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
    // ],
    [
        'label' => __('Text', 'flynt'),
        'name' => 'contentHtmlLeft',
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'delay' => 1,
        'media_upload' => 0,
        'required' => 0,
    ],
    [
        'label' => __('Logo', 'flynt'),
        'name' => 'logoFooterLeft',
        'type' => 'image',
        'preview_size' => 'medium',
        'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
        'required' => 0,
        'mime_types' => 'jpg,jpeg,png,svg',
        'wrapper' =>  [
            'width' => 100,
        ]
    ],
    [
        'label' => __('Right Column', 'flynt'),
        'name' => 'contentRightTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
    ],
    // [
    //     'label' => __('Title', 'flynt'),
    //     'name' => 'blockTitleRight',
    //     'type' => 'text',
    //     'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
    // ],
    [
        'label' => __('Text', 'flynt'),
        'name' => 'contentHtmlRight',
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'delay' => 1,
        'media_upload' => 0,
        'required' => 0,
    ],
    [
        'label' => __('Logo', 'flynt'),
        'name' => 'logoFooterRight',
        'type' => 'image',
        'preview_size' => 'medium',
        'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
        'required' => 0,
        'mime_types' => 'jpg,jpeg,png,svg',
        'wrapper' =>  [
            'width' => 100,
        ]
    ],
    // [
    //     'label' => __('Social Media', 'flynt'),
    //     'name' => 'socialmediaTab',
    //     'type' => 'tab',
    //     'placement' => 'top',
    //     'endpoint' => 0
    // ],
    // [
    //     'label' => __('Title', 'flynt'),
    //     'name' => 'socialMediaTitle',
    //     'type' => 'text'
    // ],
    // [
    //     'label' => __('Social Platform', 'flynt'),
    //     'name' => 'social',
    //     'type' => 'repeater',
    //     'layout' => 'table',
    //     'button_label' => __('Add Social Link', 'flynt'),
    //     'sub_fields' => [
    //         [
    //             'label' => __('Platform', 'flynt'),
    //             'name' => 'platform',
    //             'type' => 'select',
    //             'allow_null' => 0,
    //             'multiple' => 0,
    //             'ui' => 1,
    //             'ajax' => 0,
    //             'return_format' => 'array',
    //             'choices' => [
    //                 'twitter' => 'Twitter',
    //                 'facebook' => 'Facebook',
    //                 'linkedin' => 'Linkedin',
    //                 'instagram' => 'Instagram'
    //             ]
    //         ],
    //         [
    //             'label' => __('Link', 'flynt'),
    //             'name' => 'url',
    //             'type' => 'url',
    //             'required' => 1
    //         ],
    //     ]
    // ],
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
                'label' => __('Aria Label', 'flynt'),
                'name' => 'ariaLabel',
                'type' => 'text',
                'default_value' => __('Footer', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
