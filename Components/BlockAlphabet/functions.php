<?php

namespace Flynt\Components\BlockAlphabet;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

function getACFLayout()
{
    return [
        'name' => 'BlockAlphabet',
        'label' => 'Block: Alphabet',
        'sub_fields' => [
            // [
            //     'label' => __('General', 'flynt'),
            //     'name' => 'generalTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            [
                'label' => __('Alphabetical filter for the Glossary', 'flynt'),
                'name' => 'message',
                'type' => 'message',
                'message' => '',
                'new_lines' => 'wpautop',
                'esc_html' => 1
            ],
        ],
    ];
}
