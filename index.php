<?php
/**
 * Fallback minimal pour navigateurs très anciens
 * 
 * @package Bigjucode
 * @since 1.0.0
 */

// Sécurité : empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

// Rediriger vers l'accueil si FSE non supporté
if (function_exists('wp_is_block_theme') && wp_is_block_theme()) {
    // FSE supporté, laisser WordPress gérer
    return;
}

// Fallback ultra-minimal pour navigateurs anciens
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 800px; 
            margin: 0 auto; 
            padding: 2rem;
            line-height: 1.6;
        }
        .upgrade-notice {
            background: #f0f9ff;
            border: 2px solid #3b82f6;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div class="upgrade-notice">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <hr>
        <h2>⚠️ Navigateur non compatible</h2>
        <p>Ce site utilise les technologies WordPress modernes (FSE).</p>
        <p><strong>Veuillez mettre à jour votre navigateur :</strong></p>
        <ul style="text-align: left; display: inline-block;">
            <li>Chrome 90+</li>
            <li>Firefox 88+</li>
            <li>Safari 14+</li>
            <li>Edge 90+</li>
        </ul>
        <p><a href="<?php echo esc_url(home_url()); ?>" style="color: #3b82f6;">Réessayer</a></p>
    </div>

    <?php wp_footer(); ?>
</body>
</html>