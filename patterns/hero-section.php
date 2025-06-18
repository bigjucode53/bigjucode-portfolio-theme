<?php
/**
 * Hero Section Pattern
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

register_block_pattern(
    'bigjucode/hero-section',
    array(
        'title'         => __('Hero Section - Bigjucode', 'bigjucode'),
        'description'   => __('Section d\'accueil avec titre, sous-titre et boutons CTA', 'bigjucode'),
        'categories'    => array('bigjucode'),
        'keywords'      => array('hero', 'accueil', 'bannière', 'cta'),
        'content'       => '<!-- wp:cover {"dimRatio":0,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}},"color":{"background":"var:preset|color|base"}},"className":"hero-section"} -->
<div class="wp-block-cover alignfull is-light has-base-background-color has-background hero-section" style="min-height:100vh;padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)">
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"gigantic","style":{"typography":{"fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
            <h1 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-weight:700;margin-bottom:var(--wp--preset--spacing--medium)">
                Salut, je suis <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color"><strong>Bigjucode</strong></mark>
            </h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"x-large","style":{"color":{"text":"var:preset|color|medium-gray"},"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
            <p class="has-text-align-center has-x-large-font-size has-text-color" style="color:var(--wp--preset--color--medium-gray);margin-bottom:var(--wp--preset--spacing--large)">
                Développeur passionné créant des expériences web extraordinaires
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"border":{"radius":"50px"},"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:50px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">
                        🚀 Découvrir mon travail
                    </a>
                </div>
                <!-- /wp:button -->

                <!-- wp:button {"backgroundColor":"transparent","textColor":"primary","style":{"border":{"radius":"50px","color":"var:preset|color|primary","width":"2px"},"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}}} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-primary-color has-transparent-background-color has-text-color has-background has-border-color wp-element-button" style="border-color:var(--wp--preset--color--primary);border-width:2px;border-radius:50px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--large)">
                        💬 Me contacter
                    </a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->',
    )
);