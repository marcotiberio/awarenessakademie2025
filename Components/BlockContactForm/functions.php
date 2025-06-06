<?php

namespace Flynt\Components\BlockContactForm;

use Flynt\FieldVariables;

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
                'label' => __('Contact Form', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 1,
            ],
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
