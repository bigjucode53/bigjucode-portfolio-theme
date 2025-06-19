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
    // Vérifier que les fonctions Gutenberg existent
    if (!function_exists('register_block_type')) {
        return;
    }

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
}
add_action('wp_enqueue_scripts', 'bigjucode_enqueue_assets');

/**
 * Enqueue des assets pour l'éditeur de blocs
 */
function bigjucode_enqueue_block_editor_assets() {
    // Styles pour l'éditeur
    wp_enqueue_style(
        'bigjucode-editor-styles',
        BIGJUCODE_THEME_URI . '/assets/css/editor-style.css',
        array(),
        BIGJUCODE_VERSION
    );
}
add_action('enqueue_block_editor_assets', 'bigjucode_enqueue_block_editor_assets');

/**
 * Inclure les fichiers additionnels
 */
require_once BIGJUCODE_THEME_DIR . '/inc/blocks.php';

// Vérifier si les autres fichiers existent avant de les inclure
if (file_exists(BIGJUCODE_THEME_DIR . '/inc/customizer.php')) {
    require_once BIGJUCODE_THEME_DIR . '/inc/customizer.php';
}

if (file_exists(BIGJUCODE_THEME_DIR . '/inc/template-functions.php')) {
    require_once BIGJUCODE_THEME_DIR . '/inc/template-functions.php';
}

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
            echo "\nVOIR SUR: " . home_url('?debug_blocks=1') . "\n";
            echo '</pre>';
        }
    }
    add_action('wp_footer', 'bigjucode_debug_blocks');
    add_action('admin_footer', 'bigjucode_debug_blocks');
}
