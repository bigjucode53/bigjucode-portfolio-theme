<?php
/**
 * Services Section Pattern
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

register_block_pattern(
    'bigjucode/services-section',
    array(
        'title'         => __('Services Section - Bigjucode', 'bigjucode'),
        'description'   => __('Section des services avec grille de 3 colonnes et icônes', 'bigjucode'),
        'categories'    => array('bigjucode'),
        'keywords'      => array('services', 'savoir-faire', 'compétences', 'grille'),
        'content'       => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}}},"backgroundColor":"light-gray","className":"services-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group services-section has-light-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)">
    <!-- wp:heading {"textAlign":"center","level":2,"fontSize":"huge","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
    <h2 class="wp-block-heading has-text-align-center has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--large)">
        Mon Savoir-faire
    </h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"large","style":{"color":{"text":"var:preset|color|medium-gray"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}}} -->
    <p class="has-text-align-center has-large-font-size has-text-color" style="color:var(--wp--preset--color--medium-gray);margin-bottom:var(--wp--preset--spacing--x-large)">
        Des solutions techniques modernes et performantes pour vos projets
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large","left":"var:preset|spacing|large"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"border":{"radius":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","className":"service-card","layout":{"type":"constrained"}} -->
            <div class="wp-block-group service-card has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
                <!-- wp:paragraph {"align":"center","fontSize":"xxx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center has-xxx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    💻
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
                <h3 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--small)">
                    Développement Web
                </h3>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    Sites web modernes et performants avec les dernières technologies : React, Vue.js, WordPress, et plus encore.
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"service-features"} -->
                <ul class="service-features" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    <!-- wp:list-item -->
                    <li>Développement sur mesure</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>Responsive design</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>Performance optimisée</li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"border":{"radius":"25px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-button">
                        <a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:25px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--medium)">En savoir plus</a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"border":{"radius":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","className":"service-card","layout":{"type":"constrained"}} -->
            <div class="wp-block-group service-card has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
                <!-- wp:paragraph {"align":"center","fontSize":"xxx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center has-xxx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    📱
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
                <h3 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--small)">
                    Applications Mobile
                </h3>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    Applications natives et hybrides pour iOS et Android avec une expérience utilisateur exceptionnelle.
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"service-features"} -->
                <ul class="service-features" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    <!-- wp:list-item -->
                    <li>React Native & Flutter</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>Apps natives iOS/Android</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>UI/UX moderne</li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"secondary","textColor":"base","style":{"border":{"radius":"25px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-button">
                        <a class="wp-block-button__link has-base-color has-secondary-background-color has-text-color has-background wp-element-button" style="border-radius:25px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--medium)">En savoir plus</a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"border":{"radius":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","className":"service-card","layout":{"type":"constrained"}} -->
            <div class="wp-block-group service-card has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
                <!-- wp:paragraph {"align":"center","fontSize":"xxx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center has-xxx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    ⚡
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
                <h3 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--small)">
                    Consulting & Formation
                </h3>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    Accompagnement stratégique et formation technique pour optimiser vos projets et équipes.
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"className":"service-features"} -->
                <ul class="service-features" style="margin-bottom:var(--wp--preset--spacing--medium)">
                    <!-- wp:list-item -->
                    <li>Architecture technique</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>Code review & audit</li>
                    <!-- /wp:list-item -->
                    
                    <!-- wp:list-item -->
                    <li>Formation équipes</li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"25px"},"spacing":{"padding":{"left":"var:preset|spacing|medium","right":"var:preset|spacing|medium","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-button">
                        <a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:25px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--medium)">En savoir plus</a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
    )
);