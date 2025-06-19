<?php
/**
 * Fonctions et définitions du thème Bigjucode v2.0
 * Support complet des blocs Gutenberg personnalisés
 * 
 * @package Bigjucode
 * @since 2.0.0
 */

// Sécurité : empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

// Version du thème
define('BIGJUCODE_VERSION', '2.0.0');
define('BIGJUCODE_THEME_DIR', get_template_directory());
define('BIGJUCODE_THEME_URI', get_template_directory_uri());

/**
 * Configuration du thème
 */
function bigjucode_theme_setup() {
    // Support des langues
    load_theme_textdomain('bigjucode', BIGJUCODE_THEME_DIR . '/languages');

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
    add_image_size('bigjucode-vitrail', 300, 600, true);

    // Menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'bigjucode'),
        'footer' => __('Menu Footer', 'bigjucode'),
        'social' => __('Liens Sociaux', 'bigjucode'),
    ));
}
add_action('after_setup_theme', 'bigjucode_theme_setup');

/**
 * Enregistrer les blocs personnalisés
 */
function bigjucode_register_custom_blocks() {
    // Blocs disponibles
    $blocks = array(
        'hero-vitraux',
        'services-section',
        'cta-section'
    );

    foreach ($blocks as $block) {
        $block_path = BIGJUCODE_THEME_DIR . '/blocks/' . $block;
        
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
}
add_action('init', 'bigjucode_register_custom_blocks');

/**
 * Enqueue des styles et scripts
 */
function bigjucode_enqueue_assets() {
    // Styles principaux
    wp_enqueue_style(
        'bigjucode-style',
        get_stylesheet_uri(),
        array(),
        BIGJUCODE_VERSION
    );

    wp_enqueue_style(
        'bigjucode-main',
        BIGJUCODE_THEME_URI . '/assets/css/main.css',
        array('bigjucode-style'),
        BIGJUCODE_VERSION
    );

    // Google Fonts
    wp_enqueue_style(
        'bigjucode-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap',
        array(),
        null
    );

    // Scripts
    wp_enqueue_script(
        'bigjucode-main',
        BIGJUCODE_THEME_URI . '/assets/js/main.js',
        array(),
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
            'uri' => BIGJUCODE_THEME_URI,
        ),
    ));

    // Scripts conditionnels
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bigjucode_enqueue_assets');

/**
 * Enqueue des assets pour l'éditeur de blocs
 */
function bigjucode_enqueue_block_editor_assets() {
    // Script principal des blocs
    wp_enqueue_script(
        'bigjucode-blocks',
        BIGJUCODE_THEME_URI . '/assets/js/blocks.js',
        array(
            'wp-blocks',
            'wp-element', 
            'wp-editor',
            'wp-block-editor',
            'wp-components',
            'wp-i18n',
            'wp-api-fetch'
        ),
        BIGJUCODE_VERSION,
        true
    );

    // Styles pour l'éditeur
    wp_enqueue_style(
        'bigjucode-editor-styles',
        BIGJUCODE_THEME_URI . '/assets/css/editor-style.css',
        array(),
        BIGJUCODE_VERSION
    );

    // Variables pour les blocs
    wp_localize_script('bigjucode-blocks', 'bigjucodeBlocks', array(
        'themeUri' => BIGJUCODE_THEME_URI,
        'version' => BIGJUCODE_VERSION,
        'nonce' => wp_create_nonce('bigjucode_blocks_nonce'),
    ));
}
add_action('enqueue_block_editor_assets', 'bigjucode_enqueue_block_editor_assets');

/**
 * Enqueue des assets admin
 */
function bigjucode_admin_assets($hook) {
    wp_enqueue_style(
        'bigjucode-admin',
        BIGJUCODE_THEME_URI . '/assets/css/admin.css',
        array(),
        BIGJUCODE_VERSION
    );
}
add_action('admin_enqueue_scripts', 'bigjucode_admin_assets');

/**
 * Ajouter des classes CSS au body
 */
function bigjucode_body_classes($classes) {
    // Ajouter la classe du thème
    $classes[] = 'bigjucode-theme';
    $classes[] = 'bigjucode-v2';

    // Classe pour mobile
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    }

    // Classe pour la page d'accueil
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }

    // Classe si blocs personnalisés présents
    if (has_blocks()) {
        global $post;
        if ($post && has_block('bigjucode/hero-vitraux', $post)) {
            $classes[] = 'has-hero-vitraux';
        }
        if ($post && has_block('bigjucode/services-section', $post)) {
            $classes[] = 'has-services-section';
        }
        if ($post && has_block('bigjucode/cta-section', $post)) {
            $classes[] = 'has-cta-section';
        }
    }

    return $classes;
}
add_filter('body_class', 'bigjucode_body_classes');

/**
 * Catégorie de blocs personnalisés
 */
function bigjucode_register_block_category($categories) {
    return array_merge(
        array(
            array(
                'slug'  => 'bigjucode',
                'title' => __('Bigjucode Blocks', 'bigjucode'),
                'icon'  => 'admin-customizer',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'bigjucode_register_block_category', 10, 2);

/**
 * Personnalisation de l'éditeur Gutenberg
 */
function bigjucode_editor_settings() {
    // Palette de couleurs pour l'éditeur
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Base', 'bigjucode'),
            'slug' => 'base',
            'color' => '#ffffff',
        ),
        array(
            'name' => __('Contrast', 'bigjucode'),
            'slug' => 'contrast',
            'color' => '#1f2937',
        ),
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
            'name' => __('Error', 'bigjucode'),
            'slug' => 'error',
            'color' => '#ef4444',
        ),
        array(
            'name' => __('Success', 'bigjucode'),
            'slug' => 'success',
            'color' => '#22c55e',
        ),
        array(
            'name' => __('Light Gray', 'bigjucode'),
            'slug' => 'light-gray',
            'color' => '#f3f4f6',
        ),
        array(
            'name' => __('Medium Gray', 'bigjucode'),
            'slug' => 'medium-gray',
            'color' => '#6b7280',
        ),
        array(
            'name' => __('Dark Gray', 'bigjucode'),
            'slug' => 'dark-gray',
            'color' => '#374151',
        ),
    ));

    // Tailles de police pour l'éditeur
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('X-Small', 'bigjucode'),
            'size' => 12,
            'slug' => 'x-small'
        ),
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
            'size' => 18,
            'slug' => 'medium'
        ),
        array(
            'name' => __('Large', 'bigjucode'),
            'size' => 24,
            'slug' => 'large'
        ),
        array(
            'name' => __('X-Large', 'bigjucode'),
            'size' => 30,
            'slug' => 'x-large'
        ),
        array(
            'name' => __('XX-Large', 'bigjucode'),
            'size' => 36,
            'slug' => 'xx-large'
        ),
        array(
            'name' => __('Huge', 'bigjucode'),
            'size' => 48,
            'slug' => 'huge'
        ),
        array(
            'name' => __('Gigantic', 'bigjucode'),
            'size' => 64,
            'slug' => 'gigantic'
        ),
    ));

    // Gradients personnalisés
    add_theme_support('editor-gradient-presets', array(
        array(
            'name'     => __('Primary to Secondary', 'bigjucode'),
            'gradient' => 'linear-gradient(135deg, #3b82f6 0%, #10b981 100%)',
            'slug'     => 'primary-secondary',
        ),
        array(
            'name'     => __('Accent to Primary', 'bigjucode'),
            'gradient' => 'linear-gradient(135deg, #f59e0b 0%, #3b82f6 100%)',
            'slug'     => 'accent-primary',
        ),
        array(
            'name'     => __('Vitrail Colors', 'bigjucode'),
            'gradient' => 'linear-gradient(135deg, #f59e0b 0%, #10b981 30%, #3b82f6 60%, #ef4444 100%)',
            'slug'     => 'vitrail-colors',
        ),
    ));
}
add_action('after_setup_theme', 'bigjucode_editor_settings');

/**
 * Ajouter des styles personnalisés pour les blocs
 */
function bigjucode_block_styles() {
    // Style de bouton pour les blocs
    register_block_style('core/button', array(
        'name'  => 'bigjucode-glassmorphism',
        'label' => __('Glassmorphism', 'bigjucode'),
    ));

    // Style de groupe pour les cartes
    register_block_style('core/group', array(
        'name'  => 'bigjucode-card',
        'label' => __('Card Style', 'bigjucode'),
    ));

    // Style de colonne pour les vitraux
    register_block_style('core/column', array(
        'name'  => 'bigjucode-vitrail',
        'label' => __('Vitrail Effect', 'bigjucode'),
    ));
}
add_action('init', 'bigjucode_block_styles');

/**
 * Sécurité et optimisations
 */
// Supprimer la version WordPress des headers
remove_action('wp_head', 'wp_generator');

// Supprimer les liens inutiles du head
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// Optimiser les emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Hooks d'activation/désactivation
 */
function bigjucode_activation() {
    // Actions lors de l'activation du thème
    flush_rewrite_rules();
    
    // Créer les tailles d'images si nécessaire
    if (function_exists('wp_generate_attachment_metadata')) {
        // Régénérer les thumbnails pour les nouvelles tailles
    }
}
add_action('after_switch_theme', 'bigjucode_activation');

/**
 * Fonction utilitaire pour vérifier si un bloc est présent
 */
function bigjucode_has_block($block_name, $post = null) {
    if (!$post) {
        global $post;
    }
    
    if (!$post || !has_blocks($post)) {
        return false;
    }
    
    return has_block($block_name, $post);
}

/**
 * Ajouter des données JSON pour les blocs
 */
function bigjucode_block_data() {
    if (is_admin()) {
        $data = array(
            'themeUri' => BIGJUCODE_THEME_URI,
            'version' => BIGJUCODE_VERSION,
            'colors' => array(
                'primary' => '#3b82f6',
                'secondary' => '#10b981', 
                'accent' => '#f59e0b',
            ),
            'defaults' => array(
                'heroVideo' => 'https://videos.pexels.com/video-files/1851190/1851190-uhd_2560_1440_25fps.mp4',
                'vitrailColors' => array(
                    '#ff6b6b', '#a855f7', '#10b981', 
                    '#f59e0b', '#ef4444', '#8b5cf6'
                ),
            ),
        );
        
        wp_add_inline_script(
            'bigjucode-blocks',
            'window.bigjucodeBlockData = ' . wp_json_encode($data) . ';',
            'before'
        );
    }
}
add_action('admin_enqueue_scripts', 'bigjucode_block_data');

/**
 * Inclure les fichiers additionnels
 */
require_once BIGJUCODE_THEME_DIR . '/inc/blocks.php';
require_once BIGJUCODE_THEME_DIR . '/inc/customizer.php';
require_once BIGJUCODE_THEME_DIR . '/inc/template-functions.php';

/**
 * Debug pour le développement
 */
if (defined('WP_DEBUG') && WP_DEBUG) {
    function bigjucode_debug_blocks() {
        if (current_user_can('manage_options') && isset($_GET['debug_blocks'])) {
            $blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
            $bigjucode_blocks = array_filter($blocks, function($key) {
                return strpos($key, 'bigjucode/') === 0;
            }, ARRAY_FILTER_USE_KEY);
            
            echo '<pre style="background:black;color:lime;padding:20px;position:fixed;top:0;right:0;z-index:9999;max-width:400px;">';
            echo "BLOCS BIGJUCODE ENREGISTRÉS:\n";
            foreach ($bigjucode_blocks as $name => $block) {
                echo "✅ " . $name . "\n";
            }
            echo '</pre>';
        }
    }
    add_action('wp_footer', 'bigjucode_debug_blocks');
    add_action('admin_footer', 'bigjucode_debug_blocks');
}