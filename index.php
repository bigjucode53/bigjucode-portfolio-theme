<?php
/**
 * Fallback template pour les navigateurs non-compatibles avec FSE
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

// Sécurité : empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            </div>
        </header>

        <main id="primary" class="site-main">
            <div class="fallback-message">
                <h2>Thème FSE non supporté</h2>
                <p>Ce thème nécessite WordPress 6.0+ avec support FSE.</p>
                <p>Veuillez mettre à jour WordPress ou utiliser un navigateur moderne.</p>
            </div>
        </main>

        <footer id="colophon" class="site-footer">
            <div class="site-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.</p>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>
</body>
</html>