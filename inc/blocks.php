<?php
/**
 * Gestion des blocs personnalisés Bigjucode
 * 
 * @package Bigjucode
 * @since 2.0.0
 */

// Sécurité
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Rendu du bloc Hero Vitraux côté frontend
 */
function bigjucode_render_hero_vitraux($attributes) {
    $video_url = esc_url($attributes['videoUrl'] ?? '');
    $title = wp_kses_post($attributes['title'] ?? 'Créateur d\'Expériences Sacrées');
    $subtitle = wp_kses_post($attributes['subtitle'] ?? 'Développeur passionné');
    
    // Récupérer les vitraux
    $vitraux = [];
    for ($i = 1; $i <= 6; $i++) {
        if (!empty($attributes["vitrail{$i}"]['url'])) {
            $vitraux[] = esc_url($attributes["vitrail{$i}"]['url']);
        }
    }
    
    ob_start();
    ?>
    <div class="wp-block-bigjucode-hero-vitraux">
        <?php if ($video_url): ?>
        <div class="bigjucode-hero-video">
            <video autoplay muted loop playsinline>
                <source src="<?php echo $video_url; ?>" type="video/mp4">
            </video>
        </div>
        <?php endif; ?>
        
        <div class="bigjucode-hero-overlay"></div>
        
        <div class="bigjucode-vitraux-overlay">
            <?php 
            $default_colors = [
                'linear-gradient(45deg, #ff6b6b, #ffd700)',
                'linear-gradient(45deg, #636bff, #9b59b6)', 
                'linear-gradient(45deg, #10b981, #06b6d4)',
                'linear-gradient(45deg, #ff6bff, #d946ef)',
                'linear-gradient(45deg, #ffbf00, #ffd700)',
                'linear-gradient(45deg, #ff8300, #dc2626)'
            ];
            
            for ($i = 0; $i < 6; $i++): 
                $bg_style = '';
                if (isset($vitraux[$i])) {
                    $bg_style = "background-image: url('{$vitraux[$i]}');";
                } else {
                    $bg_style = "background: {$default_colors[$i]};";
                }
            ?>
                <div class="bigjucode-vitrail" style="<?php echo $bg_style; ?>"></div>
            <?php endfor; ?>
        </div>
        
        <div class="bigjucode-hero-content">
            <div>
                <?php if ($title): ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ($subtitle): ?>
                    <p><?php echo $subtitle; ?></p>
                <?php endif; ?>
                
                <div class="bigjucode-hero-buttons">
                    <a href="#" class="bigjucode-btn-primary">⛪ Découvrir mes Créations</a>
                    <a href="#" class="bigjucode-btn-secondary">🙏 Commencer une Collaboration</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Enregistrer les callbacks de rendu des blocs
 */
function bigjucode_register_block_render_callbacks() {
    if (function_exists('register_block_type')) {
        // Hero Vitraux avec callback de rendu
        register_block_type('bigjucode/hero-vitraux', array(
            'render_callback' => 'bigjucode_render_hero_vitraux'
        ));
    }
}
add_action('init', 'bigjucode_register_block_render_callbacks', 20);
