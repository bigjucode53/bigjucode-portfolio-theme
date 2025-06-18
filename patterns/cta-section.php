<?php
/**
 * Call to Action Section Pattern
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

register_block_pattern(
    'bigjucode/cta-section',
    array(
        'title'         => __('Call to Action - Bigjucode', 'bigjucode'),
        'description'   => __('Section d\'appel à l\'action avec gradient et boutons', 'bigjucode'),
        'categories'    => array('bigjucode'),
        'keywords'      => array('cta', 'contact', 'collaboration', 'gradient'),
        'content'       => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}},"color":{"gradient":"linear-gradient(135deg,rgb(59,130,246) 0%,rgb(16,185,129) 100%)"}},"textColor":"base","className":"cta-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-section has-base-color has-text-color has-background" style="background:linear-gradient(135deg,rgb(59,130,246) 0%,rgb(16,185,129) 100%);padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)">
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"textAlign":"center","level":2,"fontSize":"huge","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}},"typography":{"fontWeight":"700"}},"textColor":"base"} -->
        <h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-huge-font-size" style="font-weight:700;margin-bottom:var(--wp--preset--spacing--medium)">
            Prêt à collaborer ?
        </h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}},"color":{"text":"rgba(255,255,255,0.9)"}},"className":"cta-description"} -->
        <p class="cta-description has-text-color has-large-font-size has-text-align-center" style="color:rgba(255,255,255,0.9);margin-bottom:var(--wp--preset--spacing--large)">
            Transformons ensemble vos idées en solutions techniques exceptionnelles. Contactez-moi pour discuter de votre projet !
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"base","textColor":"primary","style":{"border":{"radius":"50px"},"spacing":{"padding":{"left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"className":"cta-primary"} -->
            <div class="wp-block-button cta-primary">
                <a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" style="border-radius:50px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-large)">
                    🚀 Démarrer un projet
                </a>
            </div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"transparent","style":{"border":{"radius":"50px","color":"rgba(255,255,255,0.3)","width":"2px"},"spacing":{"padding":{"left":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"color":{"text":"rgba(255,255,255,0.95)"}},"className":"cta-secondary"} -->
            <div class="wp-block-button cta-secondary">
                <a class="wp-block-button__link has-text-color has-background has-border-color wp-element-button" style="border-color:rgba(255,255,255,0.3);border-width:2px;border-radius:50px;color:rgba(255,255,255,0.95);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-large)">
                    💬 Discutons ensemble
                </a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large"}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-large)">
            <!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.8)"}},"fontSize":"small"} -->
            <p class="has-text-color has-small-font-size" style="color:rgba(255,255,255,0.8)">
                ✉️ contact@bigjucode.com
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.8)"}},"fontSize":"small"} -->
            <p class="has-text-color has-small-font-size" style="color:rgba(255,255,255,0.8)">
                📱 Réponse sous 24h
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.8)"}},"fontSize":"small"} -->
            <p class="has-text-color has-small-font-size" style="color:rgba(255,255,255,0.8)">
                🎯 Devis gratuit
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->',
    )
);