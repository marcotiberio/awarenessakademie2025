<?php

namespace Flynt\Components\BlockContactForm;

use Flynt\FieldVariables;

// Ensure WPForms scripts are enqueued when this component is used
add_filter('Flynt/addComponentData?name=BlockContactForm', function ($data) {
    // Check if displayForm is true and contactForm is set
    if (!empty($data['displayForm']) && !empty($data['contactForm'])) {
        // Enqueue WPForms scripts and styles
        if (function_exists('wpforms') && wpforms()->frontend) {
            wpforms()->frontend->assets_css();
            wpforms()->frontend->assets_js();
        }
    }
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockContactForm',
        'label' => __('Block: Contact Form', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            // [
            //     'label' => __('Contact Form Position', 'flynt'),
            //     'name' => 'contactFormPosition',
            //     'type' => 'button_group',
            //     'choices' => [
            //         'left' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Image on the left', 'flynt')),
            //         'right' => sprintf('<i class=\'dashicons dashicons-align-right\' title=\'%1$s\'></i>', __('Image on the right', 'flynt'))
            //     ],
            //     'wrapper' => [
            //         'width' => 100
            //     ],
            // ],
            // [
            //     'label' => __('Title', 'flynt'),
            //     'name' => 'blockTitle',
            //     'type' => 'text',
            // ],
            [
                'label' => __('Select form to be displayed.', 'flynt'),
                'instructions' => __('Select a WPForms form.', 'flynt'),
                'name' => 'contactForm',
                'type' => 'post_object',
                'post_type' => ['wpforms'],
                'allow_null' => 1,
            ],
            // [
            //     'label' => __('Contact Form', 'flynt'),
            //     'name' => 'contentHtml',
            //     'type' => 'wysiwyg',
            //     'delay' => 1,
            //     'media_upload' => 0,
            //     'required' => 1,
            // ],
            // [
            //     'label' => __('Options', 'flynt'),
            //     'name' => 'optionsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
        ]
    ];
}
