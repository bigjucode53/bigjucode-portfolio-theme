<?php
/**
 * Fonctions et définitions du thème Bigjucode
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

// Sécurité : empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

// Version du thème
define('BIGJUCODE_VERSION', '1.0.0');

/**
 * Configuration du thème
 */
function bigjucode_theme_setup()
{
    // Support des langues
    load_theme_textdomain('bigjucode', get_template_directory() . '/languages');

    // Support HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Support des images à la une
    add_theme_support('post-thumbnails');

    // Support du titre automatique
    add_theme_support('title-tag');

    // Support des liens RSS automatiques
    add_theme_support('automatic-feed-links');

    // Support de l'éditeur de blocs
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Support des couleurs personnalisées
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Support du logo personnalisé
    add_theme_support('custom-logo', array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ));

    // Tailles d'images personnalisées
    add_image_size('bigjucode-featured', 1200, 630, true);
    add_image_size('bigjucode-portfolio', 800, 600, true);
    add_image_size('bigjucode-thumbnail', 400, 300, true);

    // Menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'bigjucode'),
        'footer' => __('Menu Footer', 'bigjucode'),
        'social' => __('Liens Sociaux', 'bigjucode'),
    ));
}
add_action('after_setup_theme', 'bigjucode_theme_setup');

/**
 * Enqueue des styles et scripts
 */
function bigjucode_enqueue_assets()
{
    // Styles
    wp_enqueue_style(
        'bigjucode-style',
        get_stylesheet_uri(),
        array(),
        BIGJUCODE_VERSION
    );

    wp_enqueue_style(
        'bigjucode-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('bigjucode-style'),
        BIGJUCODE_VERSION
    );

    // Google Fonts
    wp_enqueue_style(
        'bigjucode-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Scripts
    // GSAP Library
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
        array(),
        '3.12.2',
        true
    );

    // Script principal (doit être après GSAP)
    wp_enqueue_script(
        'bigjucode-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('gsap'),  // Dépendance GSAP
        BIGJUCODE_VERSION,
        true
    );

    // Variables pour JavaScript
    wp_localize_script('bigjucode-main', 'bigjucodeData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('bigjucode_nonce'),
        'theme' => array(
            'name' => get_template(),
            'version' => BIGJUCODE_VERSION,
            'uri' => get_template_directory_uri(),
        ),
    ));

    // Scripts conditionnels
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bigjucode_enqueue_assets');

/**
 * Enqueue des assets admin
 */
function bigjucode_admin_assets($hook)
{
    wp_enqueue_style(
        'bigjucode-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        BIGJUCODE_VERSION
    );
}
add_action('admin_enqueue_scripts', 'bigjucode_admin_assets');

/**
 * Ajouter des classes CSS au body
 */
function bigjucode_body_classes($classes)
{
    // Ajouter la classe du thème
    $classes[] = 'bigjucode-theme';

    // Classe pour mobile
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    }

    // Classe pour la page d'accueil
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }

    return $classes;
}
add_filter('body_class', 'bigjucode_body_classes');

/**
 * Personnalisation de l'éditeur Gutenberg
 */
function bigjucode_editor_settings()
{
    // Palette de couleurs pour l'éditeur
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primary', 'bigjucode'),
            'slug' => 'primary',
            'color' => '#3b82f6',
        ),
        array(
            'name' => __('Secondary', 'bigjucode'),
            'slug' => 'secondary',
            'color' => '#10b981',
        ),
        array(
            'name' => __('Accent', 'bigjucode'),
            'slug' => 'accent',
            'color' => '#f59e0b',
        ),
        array(
            'name' => __('Dark', 'bigjucode'),
            'slug' => 'dark',
            'color' => '#1f2937',
        ),
        array(
            'name' => __('Light', 'bigjucode'),
            'slug' => 'light',
            'color' => '#f9fafb',
        ),
    ));

    // Tailles de police pour l'éditeur
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'bigjucode'),
            'size' => 14,
            'slug' => 'small'
        ),
        array(
            'name' => __('Normal', 'bigjucode'),
            'size' => 16,
            'slug' => 'normal'
        ),
        array(
            'name' => __('Medium', 'bigjucode'),
            'size' => 20,
            'slug' => 'medium'
        ),
        array(
            'name' => __('Large', 'bigjucode'),
            'size' => 28,
            'slug' => 'large'
        ),
        array(
            'name' => __('Huge', 'bigjucode'),
            'size' => 36,
            'slug' => 'huge'
        ),
    ));
}
add_action('after_setup_theme', 'bigjucode_editor_settings');

/**
 * Sécurité et optimisations
 */
// Supprimer la version WordPress des headers
remove_action('wp_head', 'wp_generator');

// Supprimer les liens inutiles du head
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Hooks d'activation/désactivation
 */
function bigjucode_activation()
{
    // Actions lors de l'activation du thème
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'bigjucode_activation');