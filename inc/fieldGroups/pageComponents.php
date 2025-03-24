<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageMeta',
        'title' => 'Page Meta',
        'style' => '',
        'fields' => [
            [
                'label' => __('Page Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Page Background', 'flynt'),
                'name' => 'pageBackground',
                'type' => 'color_picker',
                'default' => '#ffffff',
                'required' => 0
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ]
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'news'
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'offer'
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'resource'
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'side',
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => __('Page Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    // Components\AccordionDefault\getACFLayout(),
                    // Components\BannerImageText\getACFLayout(),
                    // Components\BlockAnchor\getACFLayout(),
                    // Components\BlockBanner\getACFLayout(),
                    Components\BlockBoxes2\getACFLayout(),
                    Components\BlockBoxes3\getACFLayout(),
                    // Components\BlockCollapse\getACFLayout(),
                    // Components\BlockContactForm\getACFLayout(),
                    // Components\BlockCountdown\getACFLayout(),
                    Components\BlockDivider\getACFLayout(),
                    // Components\BlockCta\getACFLayout(),
                    // Components\BlockImage\getACFLayout(),
                    // Components\BlockImageText\getACFLayout(),
                    // Components\BlockImageTextNew\getACFLayout(),
                    // Components\BlockImageTextNew2\getACFLayout(),
                    // Components\BlockTicker\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    // Components\BlockWysiwygRepeater\getACFLayout(),
                    // Components\BlockWysiwygTwoCol\getACFLayout(),
                    // Components\GridLogos\getACFLayout(),
                    // Components\GridPostSelector\getACFLayout(),
                    Components\HeroAWA\getACFLayout(),
                    // Components\HeroMultimedia\getACFLayout(),
                    // Components\HeroMultimediaComplex\getACFLayout(),
                    Components\ListingFeatNews\getACFLayout(),
                    Components\ListingFeatProjects\getACFLayout(),
                    Components\ListingGlossar\getACFLayout(),
                    Components\ListingNetwork\getACFLayout(),
                    Components\ListingNews\getACFLayout(),
                    Components\ListingPastRoundtables\getACFLayout(),
                    Components\ListingFutureRoundtables\getACFLayout(),
                    Components\ListingOngoingRoundtables\getACFLayout(),
                    Components\ListingPastWorkshops\getACFLayout(),
                    Components\ListingFutureWorkshops\getACFLayout(),
                    Components\ListingOngoingWorkshops\getACFLayout(),
                    Components\ListingProjects\getACFLayout(),
                    Components\ListingResources\getACFLayout(),
                    // Components\ListTextLink\getACFLayout(),
                    // Components\ListingArtists\getACFLayout(),
                    // Components\ListingPastEvents\getACFLayout(),
                    // Components\ListingUpcomingEvents\getACFLayout(),
                    // Components\SliderBox\getACFLayout(),
                    // Components\SliderLogos\getACFLayout(),
                    // Components\SliderImages\getACFLayout(),
                    // Components\SliderPosts\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'news'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'workshop'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'resource'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'roundtable'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'netzwerk'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'glossar'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'reusable-components'
                ],
            ],
        ],
    ]);
});
