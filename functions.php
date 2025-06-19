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

/**
 * Enregistrer les blocs personnalisés (VERSION UNIQUE)
 */
function bigjucode_register_custom_blocks() {
    if (!function_exists('register_block_type')) {
        return;
    }

    // Test direct
    register_block_type('bigjucode/hero-test', array(
        'title' => 'Hero Test',
        'category' => 'bigjucode',
        'render_callback' => function() {
            return '<div style="background:#334155;color:white;padding:4rem;text-align:center;">HERO TEST - ÇA MARCHE !</div>';
        }
    ));

    // Vos blocs avec fichiers
    $blocks = array('hero-vitraux', 'services-section', 'cta-section');
    foreach ($blocks as $block) {
        $block_path = get_template_directory() . '/blocks/' . $block;
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
}
add_action('init', 'bigjucode_register_custom_blocks');

/**
 * BLOC TEST RADICAL - Tout dans functions.php
 */
function bigjucode_bloc_radical() {
    // Script JavaScript inline
    wp_register_script(
        'bigjucode-radical',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor'),
        '1.0',
        false
    );

    // Code JavaScript du bloc directement dans PHP
    $bloc_js = "
    (function(blocks, element, blockEditor) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;

        blocks.registerBlockType('bigjucode/radical', {
            title: '🔥 BLOC RADICAL',
            category: 'widgets',
            icon: 'smiley',
            edit: function() {
                return el('div', useBlockProps({
                    style: {
                        padding: '3rem',
                        background: 'linear-gradient(45deg, #ff6b6b, #4ecdc4)',
                        color: 'white',
                        textAlign: 'center',
                        fontSize: '2rem',
                        fontWeight: 'bold'
                    }
                }), '🔥 BLOC RADICAL - ÇA MARCHE ! 🔥');
            },
            save: function() {
                return el('div', useBlockProps.save({
                    style: {
                        padding: '3rem',
                        background: 'linear-gradient(45deg, #ff6b6b, #4ecdc4)',
                        color: 'white',
                        textAlign: 'center',
                        fontSize: '2rem',
                        fontWeight: 'bold'
                    }
                }), '🔥 BLOC RADICAL AFFICHÉ ! 🔥');
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor);
    ";

    wp_add_inline_script('bigjucode-radical', $bloc_js);
    wp_enqueue_script('bigjucode-radical');
}
add_action('enqueue_block_editor_assets', 'bigjucode_bloc_radical');

/**
 * HERO VITRAUX - Version qui marche
 */
function bigjucode_hero_vitraux() {
    wp_register_script(
        'bigjucode-hero',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'),
        '1.0',
        false
    );

    $hero_js = "
    (function(blocks, element, blockEditor, components) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;
        var RichText = blockEditor.RichText;
        var InspectorControls = blockEditor.InspectorControls;
        var PanelBody = components.PanelBody;
        var TextControl = components.TextControl;

        blocks.registerBlockType('bigjucode/hero-vitraux', {
            title: '🏛️ Hero Vitraux',
            category: 'widgets',
            icon: 'format-image',
            attributes: {
                title: { type: 'string', default: 'Développeur Full Stack' },
                subtitle: { type: 'string', default: 'Créateur d\'expériences digitales' },
                videoUrl: { type: 'string', default: '' }
            },
            edit: function(props) {
                var attributes = props.attributes;
                var setAttributes = props.setAttributes;
                
                return el(element.Fragment, {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: '🎬 Vidéo de fond', initialOpen: true },
                            el(TextControl, {
                                label: 'URL de la vidéo',
                                value: attributes.videoUrl,
                                onChange: function(value) { setAttributes({ videoUrl: value }); },
                                placeholder: 'https://example.com/video.mp4'
                            })
                        )
                    ),
                    el('div', useBlockProps({
                        style: {
                            minHeight: '60vh',
                            background: attributes.videoUrl ? 
                                'linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(' + attributes.videoUrl + ')' :
                                'linear-gradient(135deg, #1e293b 0%, #334155 100%)',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                            display: 'flex',
                            flexDirection: 'column',
                            justifyContent: 'center',
                            alignItems: 'center',
                            color: 'white',
                            textAlign: 'center',
                            padding: '2rem'
                        }
                    }),
                        el(RichText, {
                            tagName: 'h1',
                            value: attributes.title,
                            onChange: function(value) { setAttributes({ title: value }); },
                            placeholder: 'Votre titre...',
                            style: { fontSize: '3rem', marginBottom: '1rem', textShadow: '0 4px 8px rgba(0,0,0,0.3)' }
                        }),
                        el(RichText, {
                            tagName: 'p',
                            value: attributes.subtitle,
                            onChange: function(value) { setAttributes({ subtitle: value }); },
                            placeholder: 'Votre sous-titre...',
                            style: { fontSize: '1.2rem', marginBottom: '2rem', opacity: '0.9' }
                        }),
                        el('div', {
                            style: {
                                display: 'inline-block',
                                padding: '1rem 2rem',
                                background: 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)',
                                color: 'white',
                                borderRadius: '50px',
                                fontWeight: '600'
                            }
                        }, 'Découvrir mes projets')
                    )
                );
            },
            save: function(props) {
                var attributes = props.attributes;
                
                return el('div', useBlockProps.save({
                    style: {
                        minHeight: '60vh',
                        background: attributes.videoUrl ? 
                            'linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(' + attributes.videoUrl + ')' :
                            'linear-gradient(135deg, #1e293b 0%, #334155 100%)',
                        backgroundSize: 'cover',
                        backgroundPosition: 'center',
                        display: 'flex',
                        flexDirection: 'column',
                        justifyContent: 'center',
                        alignItems: 'center',
                        color: 'white',
                        textAlign: 'center',
                        padding: '2rem'
                    }
                }),
                    el(RichText.Content, {
                        tagName: 'h1',
                        value: attributes.title,
                        style: { fontSize: '3rem', marginBottom: '1rem', textShadow: '0 4px 8px rgba(0,0,0,0.3)' }
                    }),
                    el(RichText.Content, {
                        tagName: 'p',
                        value: attributes.subtitle,
                        style: { fontSize: '1.2rem', marginBottom: '2rem', opacity: '0.9' }
                    }),
                    el('a', {
                        href: '#portfolio',
                        style: {
                            display: 'inline-block',
                            padding: '1rem 2rem',
                            background: 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)',
                            color: 'white',
                            borderRadius: '50px',
                            fontWeight: '600',
                            textDecoration: 'none'
                        }
                    }, 'Découvrir mes projets')
                );
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
    ";

    wp_add_inline_script('bigjucode-hero', $hero_js);
    wp_enqueue_script('bigjucode-hero');
}
add_action('enqueue_block_editor_assets', 'bigjucode_hero_vitraux');

/**
 * SERVICES SECTION - Version qui marche
 */
function bigjucode_services_section() {
    wp_register_script(
        'bigjucode-services',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor'),
        '1.0',
        false
    );

    $services_js = "
    (function(blocks, element, blockEditor) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;
        var RichText = blockEditor.RichText;

        blocks.registerBlockType('bigjucode/services-section', {
            title: '⚡ Services Section',
            category: 'widgets',
            icon: 'grid-view',
            attributes: {
                title: { type: 'string', default: 'Mes Services' },
                subtitle: { type: 'string', default: 'Solutions complètes pour vos projets' }
            },
            edit: function(props) {
                var attributes = props.attributes;
                var setAttributes = props.setAttributes;
                
                return el('div', useBlockProps({
                    style: { padding: '4rem 2rem', background: '#f8fafc' }
                }),
                    el('div', { style: { maxWidth: '1200px', margin: '0 auto', textAlign: 'center' } },
                        el(RichText, {
                            tagName: 'h2',
                            value: attributes.title,
                            onChange: function(value) { setAttributes({ title: value }); },
                            placeholder: 'Titre des services...',
                            style: { fontSize: '2.5rem', marginBottom: '1rem', color: '#1e293b' }
                        }),
                        el(RichText, {
                            tagName: 'p',
                            value: attributes.subtitle,
                            onChange: function(value) { setAttributes({ subtitle: value }); },
                            placeholder: 'Sous-titre...',
                            style: { fontSize: '1.2rem', color: '#64748b', marginBottom: '3rem' }
                        }),
                        el('div', {
                            style: {
                                display: 'grid',
                                gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))',
                                gap: '2rem'
                            }
                        },
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '🚀'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Développement Web'),
                                el('p', { style: { color: '#64748b' } }, 'Sites web modernes et performants')
                            ),
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '📱'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Apps Mobile'),
                                el('p', { style: { color: '#64748b' } }, 'Applications natives et hybrides')
                            ),
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '💡'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Consulting'),
                                el('p', { style: { color: '#64748b' } }, 'Conseils techniques et stratégiques')
                            )
                        )
                    )
                );
            },
            save: function(props) {
                var attributes = props.attributes;
                
                return el('div', useBlockProps.save({
                    style: { padding: '4rem 2rem', background: '#f8fafc' }
                }),
                    el('div', { style: { maxWidth: '1200px', margin: '0 auto', textAlign: 'center' } },
                        el(RichText.Content, {
                            tagName: 'h2',
                            value: attributes.title,
                            style: { fontSize: '2.5rem', marginBottom: '1rem', color: '#1e293b' }
                        }),
                        el(RichText.Content, {
                            tagName: 'p',
                            value: attributes.subtitle,
                            style: { fontSize: '1.2rem', color: '#64748b', marginBottom: '3rem' }
                        }),
                        el('div', {
                            style: {
                                display: 'grid',
                                gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))',
                                gap: '2rem'
                            }
                        },
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '🚀'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Développement Web'),
                                el('p', { style: { color: '#64748b' } }, 'Sites web modernes et performants')
                            ),
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '📱'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Apps Mobile'),
                                el('p', { style: { color: '#64748b' } }, 'Applications natives et hybrides')
                            ),
                            el('div', {
                                style: {
                                    background: 'white',
                                    padding: '2rem',
                                    borderRadius: '12px',
                                    boxShadow: '0 4px 6px rgba(0,0,0,0.1)'
                                }
                            },
                                el('div', { style: { fontSize: '3rem', marginBottom: '1rem' } }, '💡'),
                                el('h3', { style: { fontSize: '1.5rem', marginBottom: '1rem', color: '#1e293b' } }, 'Consulting'),
                                el('p', { style: { color: '#64748b' } }, 'Conseils techniques et stratégiques')
                            )
                        )
                    )
                );
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor);
    ";

    wp_add_inline_script('bigjucode-services', $services_js);
    wp_enqueue_script('bigjucode-services');
}
add_action('enqueue_block_editor_assets', 'bigjucode_services_section');

/**
 * CTA SECTION - Version qui marche
 */
function bigjucode_cta_section() {
    wp_register_script(
        'bigjucode-cta',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'),
        '1.0',
        false
    );

    $cta_js = "
    (function(blocks, element, blockEditor, components) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;
        var RichText = blockEditor.RichText;
        var InspectorControls = blockEditor.InspectorControls;
        var PanelBody = components.PanelBody;
        var TextControl = components.TextControl;
        var SelectControl = components.SelectControl;

        blocks.registerBlockType('bigjucode/cta-section', {
            title: '🎯 Call to Action',
            category: 'widgets',
            icon: 'megaphone',
            attributes: {
                title: { type: 'string', default: 'Prêt à collaborer ?' },
                description: { type: 'string', default: 'Transformons ensemble vos idées en solutions techniques exceptionnelles' },
                primaryButtonText: { type: 'string', default: 'Contactez-moi' },
                primaryButtonUrl: { type: 'string', default: '#contact' },
                secondaryButtonText: { type: 'string', default: 'Voir mes projets' },
                secondaryButtonUrl: { type: 'string', default: '#portfolio' },
                gradientType: { type: 'string', default: 'blue-green' }
            },
            edit: function(props) {
                var attributes = props.attributes;
                var setAttributes = props.setAttributes;
                
                var gradients = {
                    'blue-green': 'linear-gradient(135deg, #3b82f6 0%, #10b981 100%)',
                    'purple-pink': 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)',
                    'orange-red': 'linear-gradient(135deg, #f59e0b 0%, #ef4444 100%)',
                    'dark-blue': 'linear-gradient(135deg, #1e40af 0%, #1e293b 100%)'
                };
                
                return el(element.Fragment, {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: '🎨 Design', initialOpen: true },
                            el(SelectControl, {
                                label: 'Type de gradient',
                                value: attributes.gradientType,
                                options: [
                                    { label: 'Bleu → Vert', value: 'blue-green' },
                                    { label: 'Violet → Rose', value: 'purple-pink' },
                                    { label: 'Orange → Rouge', value: 'orange-red' },
                                    { label: 'Bleu foncé', value: 'dark-blue' }
                                ],
                                onChange: function(value) { setAttributes({ gradientType: value }); }
                            })
                        ),
                        el(PanelBody, { title: '🔗 Boutons', initialOpen: false },
                            el(TextControl, {
                                label: 'Bouton principal - Texte',
                                value: attributes.primaryButtonText,
                                onChange: function(value) { setAttributes({ primaryButtonText: value }); }
                            }),
                            el(TextControl, {
                                label: 'Bouton principal - URL',
                                value: attributes.primaryButtonUrl,
                                onChange: function(value) { setAttributes({ primaryButtonUrl: value }); },
                                placeholder: '#contact'
                            }),
                            el(TextControl, {
                                label: 'Bouton secondaire - Texte',
                                value: attributes.secondaryButtonText,
                                onChange: function(value) { setAttributes({ secondaryButtonText: value }); }
                            }),
                            el(TextControl, {
                                label: 'Bouton secondaire - URL',
                                value: attributes.secondaryButtonUrl,
                                onChange: function(value) { setAttributes({ secondaryButtonUrl: value }); },
                                placeholder: '#portfolio'
                            })
                        )
                    ),
                    el('div', useBlockProps({
                        style: {
                            padding: '4rem 2rem',
                            background: gradients[attributes.gradientType],
                            borderRadius: '16px',
                            textAlign: 'center',
                            color: 'white',
                            margin: '2rem 0',
                            position: 'relative',
                            overflow: 'hidden'
                        }
                    }),
                        el('div', {
                            style: {
                                position: 'absolute',
                                top: 0,
                                left: 0,
                                right: 0,
                                bottom: 0,
                                background: 'rgba(255,255,255,0.1)',
                                opacity: 0
                            }
                        }),
                        el('div', { style: { maxWidth: '800px', margin: '0 auto', position: 'relative', zIndex: 2 } },
                            el(RichText, {
                                tagName: 'h2',
                                value: attributes.title,
                                onChange: function(value) { setAttributes({ title: value }); },
                                placeholder: 'Titre du CTA...',
                                style: {
                                    fontSize: 'clamp(2rem, 5vw, 2.5rem)',
                                    fontWeight: '700',
                                    marginBottom: '1rem',
                                    textShadow: '0 2px 4px rgba(0,0,0,0.1)'
                                }
                            }),
                            el(RichText, {
                                tagName: 'p',
                                value: attributes.description,
                                onChange: function(value) { setAttributes({ description: value }); },
                                placeholder: 'Description...',
                                style: {
                                    fontSize: 'clamp(1rem, 2.5vw, 1.25rem)',
                                    marginBottom: '2rem',
                                    opacity: '0.95',
                                    lineHeight: '1.6'
                                }
                            }),
                            el('div', {
                                style: {
                                    display: 'flex',
                                    gap: '1rem',
                                    justifyContent: 'center',
                                    flexWrap: 'wrap',
                                    alignItems: 'center'
                                }
                            },
                                el('span', {
                                    style: {
                                        display: 'inline-flex',
                                        alignItems: 'center',
                                        padding: '1rem 2rem',
                                        background: 'rgba(255, 255, 255, 0.95)',
                                        color: '#3b82f6',
                                        borderRadius: '50px',
                                        fontWeight: '600',
                                        fontSize: '1.1rem',
                                        minWidth: '160px',
                                        justifyContent: 'center',
                                        boxShadow: '0 4px 15px rgba(0, 0, 0, 0.1)'
                                    }
                                }, attributes.primaryButtonText),
                                el('span', {
                                    style: {
                                        display: 'inline-flex',
                                        alignItems: 'center',
                                        padding: '1rem 2rem',
                                        background: 'transparent',
                                        color: 'white',
                                        border: '2px solid rgba(255, 255, 255, 0.8)',
                                        borderRadius: '50px',
                                        fontWeight: '600',
                                        fontSize: '1.1rem',
                                        minWidth: '160px',
                                        justifyContent: 'center'
                                    }
                                }, attributes.secondaryButtonText)
                            )
                        )
                    )
                );
            },
            save: function(props) {
                var attributes = props.attributes;
                
                var gradients = {
                    'blue-green': 'linear-gradient(135deg, #3b82f6 0%, #10b981 100%)',
                    'purple-pink': 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)',
                    'orange-red': 'linear-gradient(135deg, #f59e0b 0%, #ef4444 100%)',
                    'dark-blue': 'linear-gradient(135deg, #1e40af 0%, #1e293b 100%)'
                };
                
                return el('div', useBlockProps.save({
                    style: {
                        padding: '4rem 2rem',
                        background: gradients[attributes.gradientType],
                        borderRadius: '16px',
                        textAlign: 'center',
                        color: 'white',
                        margin: '2rem 0',
                        position: 'relative',
                        overflow: 'hidden'
                    }
                }),
                    el('div', { style: { maxWidth: '800px', margin: '0 auto', position: 'relative', zIndex: 2 } },
                        el(RichText.Content, {
                            tagName: 'h2',
                            value: attributes.title,
                            style: {
                                fontSize: 'clamp(2rem, 5vw, 2.5rem)',
                                fontWeight: '700',
                                marginBottom: '1rem',
                                textShadow: '0 2px 4px rgba(0,0,0,0.1)'
                            }
                        }),
                        el(RichText.Content, {
                            tagName: 'p',
                            value: attributes.description,
                            style: {
                                fontSize: 'clamp(1rem, 2.5vw, 1.25rem)',
                                marginBottom: '2rem',
                                opacity: '0.95',
                                lineHeight: '1.6'
                            }
                        }),
                        el('div', {
                            style: {
                                display: 'flex',
                                gap: '1rem',
                                justifyContent: 'center',
                                flexWrap: 'wrap',
                                alignItems: 'center'
                            }
                        },
                            el('a', {
                                href: attributes.primaryButtonUrl || '#contact',
                                style: {
                                    display: 'inline-flex',
                                    alignItems: 'center',
                                    padding: '1rem 2rem',
                                    background: 'rgba(255, 255, 255, 0.95)',
                                    color: '#3b82f6',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.1rem',
                                    minWidth: '160px',
                                    justifyContent: 'center',
                                    textDecoration: 'none',
                                    boxShadow: '0 4px 15px rgba(0, 0, 0, 0.1)',
                                    transition: 'all 0.3s ease'
                                }
                            }, attributes.primaryButtonText),
                            el('a', {
                                href: attributes.secondaryButtonUrl || '#portfolio',
                                style: {
                                    display: 'inline-flex',
                                    alignItems: 'center',
                                    padding: '1rem 2rem',
                                    background: 'transparent',
                                    color: 'white',
                                    border: '2px solid rgba(255, 255, 255, 0.8)',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.1rem',
                                    minWidth: '160px',
                                    justifyContent: 'center',
                                    textDecoration: 'none',
                                    transition: 'all 0.3s ease'
                                }
                            }, attributes.secondaryButtonText)
                        )
                    )
                );
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
    ";

    wp_add_inline_script('bigjucode-cta', $cta_js);
    wp_enqueue_script('bigjucode-cta');
}
add_action('enqueue_block_editor_assets', 'bigjucode_cta_section');

/**
 * HERO VITRAUX COMPLET - Vidéo + Upload vitraux
 */
function bigjucode_hero_vitraux_complete() {
    wp_register_script(
        'bigjucode-hero-complete',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'),
        '2.0',
        false
    );

    $hero_complete_js = "
    (function(blocks, element, blockEditor, components) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;
        var RichText = blockEditor.RichText;
        var InspectorControls = blockEditor.InspectorControls;
        var MediaUpload = blockEditor.MediaUpload;
        var MediaUploadCheck = blockEditor.MediaUploadCheck;
        var PanelBody = components.PanelBody;
        var TextControl = components.TextControl;
        var SelectControl = components.SelectControl;
        var Button = components.Button;
        var RangeControl = components.RangeControl;

        blocks.registerBlockType('bigjucode/hero-vitraux-complete', {
            title: '🏛️ Hero Chapelle & Mer',
            category: 'widgets',
            icon: 'format-image',
            attributes: {
                title: { type: 'string', default: 'Développeur Full Stack' },
                subtitle: { type: 'string', default: 'Vue depuis ma chapelle digitale' },
                videoType: { type: 'string', default: 'url' },
                videoUrl: { type: 'string', default: '' },
                videoMedia: { type: 'object', default: null },
                overlayOpacity: { type: 'number', default: 60 },
                vitrail1: { type: 'object', default: null },
                vitrail2: { type: 'object', default: null },
                vitrail3: { type: 'object', default: null },
                vitrail4: { type: 'object', default: null },
                vitrail5: { type: 'object', default: null }
            },
            edit: function(props) {
                var attributes = props.attributes;
                var setAttributes = props.setAttributes;
                
                // Obtenir l'URL de la vidéo
                var currentVideoUrl = null;
                if (attributes.videoType === 'media' && attributes.videoMedia?.url) {
                    currentVideoUrl = attributes.videoMedia.url;
                } else if (attributes.videoType === 'url' && attributes.videoUrl) {
                    currentVideoUrl = attributes.videoUrl;
                }
                
                // Fonction pour rendre un upload de vitrail
                var renderVitrailUpload = function(vitrail, index, attributeName) {
                    return el('div', {
                        style: {
                            marginBottom: '1rem',
                            padding: '1rem',
                            border: '1px solid #ddd',
                            borderRadius: '8px',
                            background: '#f9f9f9'
                        }
                    },
                        el('strong', {}, 'Vitrail ' + index),
                        vitrail?.url ? 
                            el('div', { style: { marginTop: '0.5rem' } },
                                el('img', {
                                    src: vitrail.url,
                                    style: {
                                        width: '80px',
                                        height: '120px',
                                        objectFit: 'cover',
                                        borderRadius: '4px',
                                        marginBottom: '0.5rem'
                                    }
                                }),
                                el('br'),
                                el(Button, {
                                    onClick: function() { 
                                        var newAttrs = {};
                                        newAttrs[attributeName] = null;
                                        setAttributes(newAttrs);
                                    },
                                    isDestructive: true,
                                    size: 'small'
                                }, 'Supprimer')
                            ) :
                            el('div', { style: { marginTop: '0.5rem' } },
                                el(MediaUploadCheck, {},
                                    el(MediaUpload, {
                                        onSelect: function(media) {
                                            var newAttrs = {};
                                            newAttrs[attributeName] = media;
                                            setAttributes(newAttrs);
                                        },
                                        allowedTypes: ['image'],
                                        render: function(obj) {
                                            return el(Button, {
                                                onClick: obj.open,
                                                variant: 'secondary',
                                                size: 'small'
                                            }, '📸 Choisir vitrail ' + index);
                                        }
                                    })
                                )
                            )
                    );
                };
                
                return el(element.Fragment, {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: '🎬 Vidéo de fond (Mer)', initialOpen: true },
                            el(SelectControl, {
                                label: 'Type de vidéo',
                                value: attributes.videoType,
                                options: [
                                    { label: 'URL externe (YouTube, MP4)', value: 'url' },
                                    { label: 'Fichier depuis mes médias', value: 'media' }
                                ],
                                onChange: function(value) { setAttributes({ videoType: value }); }
                            }),
                            
                            attributes.videoType === 'url' ?
                                el(TextControl, {
                                    label: 'URL de la vidéo',
                                    help: 'YouTube, Vimeo ou lien direct MP4',
                                    value: attributes.videoUrl,
                                    onChange: function(value) { setAttributes({ videoUrl: value }); },
                                    placeholder: 'https://www.youtube.com/watch?v=... ou https://example.com/mer.mp4'
                                }) :
                                el('div', {},
                                    attributes.videoMedia?.url ?
                                        el('div', { style: { marginBottom: '1rem' } },
                                            el('video', {
                                                src: attributes.videoMedia.url,
                                                style: { width: '100%', maxHeight: '150px', borderRadius: '4px' },
                                                controls: true
                                            }),
                                            el('div', { style: { marginTop: '0.5rem' } },
                                                el('strong', {}, attributes.videoMedia.filename),
                                                el('br'),
                                                el(Button, {
                                                    onClick: function() { setAttributes({ videoMedia: null }); },
                                                    isDestructive: true,
                                                    size: 'small'
                                                }, 'Supprimer la vidéo')
                                            )
                                        ) :
                                        el('div', {},
                                            el(MediaUploadCheck, {},
                                                el(MediaUpload, {
                                                    onSelect: function(media) { setAttributes({ videoMedia: media }); },
                                                    allowedTypes: ['video'],
                                                    render: function(obj) {
                                                        return el(Button, {
                                                            onClick: obj.open,
                                                            variant: 'primary'
                                                        }, '🎬 Choisir une vidéo');
                                                    }
                                                })
                                            ),
                                            el('p', {
                                                style: { fontSize: '0.9em', color: '#666', marginTop: '0.5rem' }
                                            }, 'Formats : MP4, WebM, MOV')
                                        )
                                ),
                            
                            el(RangeControl, {
                                label: 'Opacité du masque noir (%)',
                                value: attributes.overlayOpacity,
                                onChange: function(value) { setAttributes({ overlayOpacity: value }); },
                                min: 0,
                                max: 90,
                                step: 5
                            }),
                            
                            currentVideoUrl &&
                                el('div', {
                                    style: {
                                        marginTop: '1rem',
                                        padding: '0.5rem',
                                        background: '#e6f7ff',
                                        borderRadius: '4px',
                                        fontSize: '0.9em'
                                    }
                                },
                                    '✅ Vidéo configurée : ',
                                    el('code', { style: { fontSize: '0.8em' } },
                                        currentVideoUrl.length > 40 ? 
                                            currentVideoUrl.substring(0, 40) + '...' : 
                                            currentVideoUrl
                                    )
                                )
                        ),
                        
                        el(PanelBody, { title: '🏛️ Vitraux d\'église (PNG)', initialOpen: false },
                            el('p', {
                                style: { marginBottom: '1rem', fontSize: '0.9em', color: '#666' }
                            }, '📱 Mobile : 2 vitraux | 💻 Desktop : 5 vitraux | Uploadez vos images PNG de vitraux'),
                            renderVitrailUpload(attributes.vitrail1, 1, 'vitrail1'),
                            renderVitrailUpload(attributes.vitrail2, 2, 'vitrail2'),
                            renderVitrailUpload(attributes.vitrail3, 3, 'vitrail3'),
                            renderVitrailUpload(attributes.vitrail4, 4, 'vitrail4'),
                            renderVitrailUpload(attributes.vitrail5, 5, 'vitrail5')
                        )
                    ),
                    
                    el('div', useBlockProps({
                        style: {
                            minHeight: '100vh',
                            background: currentVideoUrl ? 
                                'linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url(' + currentVideoUrl + ')' :
                                'linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%)',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                            position: 'relative',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            color: 'white',
                            overflow: 'hidden'
                        }
                    }),
                        // Masque noir avec ouvertures pour vitraux
                        el('div', {
                            style: {
                                position: 'absolute',
                                top: 0,
                                left: 0,
                                right: 0,
                                bottom: 0,
                                background: 'rgba(0,0,0,' + (attributes.overlayOpacity / 100) + ')',
                                zIndex: 1
                            }
                        }),
                        
                        // Vitraux (ouvertures dans le masque)
                        el('div', {
                            style: {
                                position: 'absolute',
                                top: 0,
                                left: 0,
                                right: 0,
                                bottom: 0,
                                display: 'flex',
                                justifyContent: 'space-between',
                                alignItems: 'stretch',
                                zIndex: 2,
                                pointerEvents: 'none'
                            }
                        },
                            [attributes.vitrail1, attributes.vitrail2, attributes.vitrail3, attributes.vitrail4, attributes.vitrail5].map(function(vitrail, index) {
                                return el('div', {
                                    key: index,
                                    style: {
                                        width: '12%',
                                        height: '100%',
                                        position: 'relative',
                                        opacity: vitrail?.url ? 0.9 : 0.3
                                    }
                                },
                                    vitrail?.url ?
                                        el('img', {
                                            src: vitrail.url,
                                            style: {
                                                width: '100%',
                                                height: '100%',
                                                objectFit: 'cover',
                                                filter: 'drop-shadow(0 0 20px rgba(0,0,0,0.5))',
                                                maskImage: 'linear-gradient(to bottom, rgba(0,0,0,0.8) 10%, rgba(0,0,0,1) 20%, rgba(0,0,0,1) 80%, rgba(0,0,0,0.8) 90%)'
                                            }
                                        }) :
                                        el('div', {
                                            style: {
                                                width: '100%',
                                                height: '100%',
                                                border: '2px dashed rgba(255,255,255,0.3)',
                                                display: 'flex',
                                                alignItems: 'center',
                                                justifyContent: 'center',
                                                fontSize: '0.8rem',
                                                color: 'rgba(255,255,255,0.6)',
                                                writingMode: 'vertical-rl',
                                                textOrientation: 'mixed'
                                            }
                                        }, 'Vitrail ' + (index + 1))
                                );
                            })
                        ),
                        
                        // Contenu principal
                        el('div', {
                            style: {
                                position: 'relative',
                                zIndex: 3,
                                textAlign: 'center',
                                maxWidth: '800px',
                                padding: '2rem',
                                background: 'rgba(0,0,0,0.1)',
                                borderRadius: '20px',
                                backdropFilter: 'blur(10px)'
                            }
                        },
                            el(RichText, {
                                tagName: 'h1',
                                value: attributes.title,
                                onChange: function(value) { setAttributes({ title: value }); },
                                placeholder: 'Votre titre principal...',
                                style: {
                                    fontSize: 'clamp(2.5rem, 6vw, 4rem)',
                                    fontWeight: '700',
                                    marginBottom: '1.5rem',
                                    lineHeight: '1.1',
                                    textShadow: '0 4px 12px rgba(0,0,0,0.5)',
                                    background: 'linear-gradient(135deg, #ffffff 0%, #e0e7ff 50%, #c7d2fe 100%)',
                                    WebkitBackgroundClip: 'text',
                                    WebkitTextFillColor: 'transparent',
                                    backgroundClip: 'text'
                                }
                            }),
                            el(RichText, {
                                tagName: 'p',
                                value: attributes.subtitle,
                                onChange: function(value) { setAttributes({ subtitle: value }); },
                                placeholder: 'Votre sous-titre...',
                                style: {
                                    fontSize: 'clamp(1.1rem, 3vw, 1.4rem)',
                                    marginBottom: '2rem',
                                    opacity: '0.95',
                                    textShadow: '0 2px 8px rgba(0,0,0,0.5)',
                                    lineHeight: '1.6'
                                }
                            }),
                            el('div', {
                                style: {
                                    display: 'inline-block',
                                    padding: '1.2rem 2.5rem',
                                    background: 'linear-gradient(135deg, rgba(59,130,246,0.9) 0%, rgba(29,78,216,0.9) 100%)',
                                    color: 'white',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.1rem',
                                    boxShadow: '0 10px 30px rgba(59, 130, 246, 0.4)',
                                    backdropFilter: 'blur(10px)',
                                    border: '1px solid rgba(255,255,255,0.2)'
                                }
                            }, 'Découvrir mes créations')
                        )
                    )
                );
            },
            save: function(props) {
                // Version save similaire mais optimisée pour le frontend
                var attributes = props.attributes;
                
                var currentVideoUrl = null;
                if (attributes.videoType === 'media' && attributes.videoMedia?.url) {
                    currentVideoUrl = attributes.videoMedia.url;
                } else if (attributes.videoType === 'url' && attributes.videoUrl) {
                    currentVideoUrl = attributes.videoUrl;
                }
                
                return el('div', useBlockProps.save({
                    className: 'hero-chapelle-mer',
                    style: {
                        minHeight: '100vh',
                        position: 'relative',
                        overflow: 'hidden'
                    }
                }),
                    // Vidéo de fond
                    currentVideoUrl && el('div', {
                        className: 'video-background',
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            width: '100%',
                            height: '100%',
                            zIndex: 1
                        }
                    },
                        currentVideoUrl.includes('youtube.com') || currentVideoUrl.includes('youtu.be') ?
                            el('iframe', {
                                src: 'https://www.youtube.com/embed/' + (currentVideoUrl.includes('youtu.be') ? 
                                    currentVideoUrl.split('/').pop() :
                                    currentVideoUrl.split('v=')[1]?.split('&')[0]) + '?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&iv_load_policy=3&playlist=' + (currentVideoUrl.includes('youtu.be') ? 
                                    currentVideoUrl.split('/').pop() :
                                    currentVideoUrl.split('v=')[1]?.split('&')[0]),
                                frameBorder: '0',
                                allow: 'autoplay; encrypted-media',
                                allowFullScreen: true,
                                style: {
                                    position: 'absolute',
                                    top: '50%',
                                    left: '50%',
                                    width: '100vw',
                                    height: '56.25vw',
                                    minHeight: '100vh',
                                    minWidth: '177.77vh',
                                    transform: 'translate(-50%, -50%)'
                                }
                            }) :
                            el('video', {
                                autoPlay: true,
                                muted: true,
                                loop: true,
                                playsInline: true,
                                style: {
                                    position: 'absolute',
                                    top: '50%',
                                    left: '50%',
                                    minWidth: '100%',
                                    minHeight: '100%',
                                    width: 'auto',
                                    height: 'auto',
                                    transform: 'translate(-50%, -50%)',
                                    objectFit: 'cover'
                                }
                            },
                                el('source', { src: currentVideoUrl, type: 'video/mp4' })
                            )
                    ),
                    
                    // Contenu complet...
                    el('div', {
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: 'rgba(0,0,0,' + (attributes.overlayOpacity / 100) + ')',
                            zIndex: 2
                        }
                    }),
                    
                    // Vitraux
                    el('div', {
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            display: 'flex',
                            justifyContent: 'space-between',
                            alignItems: 'stretch',
                            zIndex: 3
                        }
                    },
                        [attributes.vitrail1, attributes.vitrail2, attributes.vitrail3, attributes.vitrail4, attributes.vitrail5].map(function(vitrail, index) {
                            return vitrail?.url && el('div', {
                                key: index,
                                className: 'vitrail-window',
                                style: {
                                    width: '12%',
                                    height: '100%',
                                    opacity: 0.9
                                }
                            },
                                el('img', {
                                    src: vitrail.url,
                                    alt: vitrail.alt || 'Vitrail ' + (index + 1),
                                    loading: 'lazy',
                                    style: {
                                        width: '100%',
                                        height: '100%',
                                        objectFit: 'cover',
                                        filter: 'drop-shadow(0 0 20px rgba(0,0,0,0.5))'
                                    }
                                })
                            );
                        }).filter(Boolean)
                    ),
                    
                    // Contenu principal
                    el('div', {
                        style: {
                            position: 'relative',
                            zIndex: 4,
                            height: '100vh',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            color: 'white',
                            textAlign: 'center'
                        }
                    },
                        el('div', {
                            style: {
                                maxWidth: '800px',
                                padding: '2rem',
                                background: 'rgba(0,0,0,0.1)',
                                borderRadius: '20px',
                                backdropFilter: 'blur(10px)'
                            }
                        },
                            el(RichText.Content, {
                                tagName: 'h1',
                                value: attributes.title,
                                style: {
                                    fontSize: 'clamp(2.5rem, 6vw, 4rem)',
                                    fontWeight: '700',
                                    marginBottom: '1.5rem',
                                    textShadow: '0 4px 12px rgba(0,0,0,0.5)'
                                }
                            }),
                            el(RichText.Content, {
                                tagName: 'p',
                                value: attributes.subtitle,
                                style: {
                                    fontSize: 'clamp(1.1rem, 3vw, 1.4rem)',
                                    marginBottom: '2rem',
                                    opacity: '0.95',
                                    textShadow: '0 2px 8px rgba(0,0,0,0.5)'
                                }
                            }),
                            el('a', {
                                href: '#portfolio',
                                style: {
                                    display: 'inline-block',
                                    padding: '1.2rem 2.5rem',
                                    background: 'linear-gradient(135deg, rgba(59,130,246,0.9) 0%, rgba(29,78,216,0.9) 100%)',
                                    color: 'white',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.1rem',
                                    textDecoration: 'none',
                                    boxShadow: '0 10px 30px rgba(59, 130, 246, 0.4)',
                                    backdropFilter: 'blur(10px)',
                                    border: '1px solid rgba(255,255,255,0.2)',
                                    transition: 'all 0.3s ease'
                                }
                            }, 'Découvrir mes créations')
                        )
                    )
                );
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
    ";

    wp_add_inline_script('bigjucode-hero-complete', $hero_complete_js);
    wp_enqueue_script('bigjucode-hero-complete');
}
add_action('enqueue_block_editor_assets', 'bigjucode_hero_vitraux_complete');

/**
 * HERO CHAPELLE SIMPLIFIÉ - Un masque vitrail unique
 */
function bigjucode_hero_chapelle_simple() {
    wp_register_script(
        'bigjucode-hero-simple',
        '',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'),
        '3.0',
        false
    );

    $hero_simple_js = "
    (function(blocks, element, blockEditor, components) {
        var el = element.createElement;
        var useBlockProps = blockEditor.useBlockProps;
        var RichText = blockEditor.RichText;
        var InspectorControls = blockEditor.InspectorControls;
        var MediaUpload = blockEditor.MediaUpload;
        var MediaUploadCheck = blockEditor.MediaUploadCheck;
        var PanelBody = components.PanelBody;
        var TextControl = components.TextControl;
        var SelectControl = components.SelectControl;
        var Button = components.Button;
        var RangeControl = components.RangeControl;

        blocks.registerBlockType('bigjucode/hero-chapelle-simple', {
            title: '⛪ Chapelle Vue Mer',
            category: 'widgets',
            icon: 'format-image',
            attributes: {
                title: { type: 'string', default: 'Développeur Full Stack' },
                subtitle: { type: 'string', default: 'Vue depuis ma chapelle digitale' },
                videoType: { type: 'string', default: 'url' },
                videoUrl: { type: 'string', default: '' },
                videoMedia: { type: 'object', default: null },
                vitrailMask: { type: 'object', default: null },
                maskOpacity: { type: 'number', default: 85 },
                ctaText: { type: 'string', default: 'Découvrir mon univers' },
                ctaUrl: { type: 'string', default: '#portfolio' }
            },
            edit: function(props) {
                var attributes = props.attributes;
                var setAttributes = props.setAttributes;
                
                // Obtenir l'URL de la vidéo
                var currentVideoUrl = null;
                if (attributes.videoType === 'media' && attributes.videoMedia?.url) {
                    currentVideoUrl = attributes.videoMedia.url;
                } else if (attributes.videoType === 'url' && attributes.videoUrl) {
                    currentVideoUrl = attributes.videoUrl;
                }
                
                return el(element.Fragment, {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: '🌊 Vidéo de fond', initialOpen: true },
                            el(SelectControl, {
                                label: 'Source de la vidéo',
                                value: attributes.videoType,
                                options: [
                                    { label: 'URL externe (YouTube, MP4)', value: 'url' },
                                    { label: 'Fichier de mes médias', value: 'media' }
                                ],
                                onChange: function(value) { setAttributes({ videoType: value }); }
                            }),
                            
                            attributes.videoType === 'url' ?
                                el(TextControl, {
                                    label: 'URL de la vidéo',
                                    help: 'YouTube, Vimeo ou lien direct vers un MP4',
                                    value: attributes.videoUrl,
                                    onChange: function(value) { setAttributes({ videoUrl: value }); },
                                    placeholder: 'https://www.youtube.com/watch?v=... ou https://example.com/mer.mp4'
                                }) :
                                el('div', {},
                                    attributes.videoMedia?.url ?
                                        el('div', { style: { marginBottom: '1rem' } },
                                            el('video', {
                                                src: attributes.videoMedia.url,
                                                style: { width: '100%', maxHeight: '120px', borderRadius: '6px' },
                                                controls: true
                                            }),
                                            el('div', { style: { marginTop: '0.5rem' } },
                                                el('strong', {}, attributes.videoMedia.filename),
                                                el('br'),
                                                el(Button, {
                                                    onClick: function() { setAttributes({ videoMedia: null }); },
                                                    isDestructive: true,
                                                    size: 'small'
                                                }, 'Supprimer')
                                            )
                                        ) :
                                        el('div', {},
                                            el(MediaUploadCheck, {},
                                                el(MediaUpload, {
                                                    onSelect: function(media) { setAttributes({ videoMedia: media }); },
                                                    allowedTypes: ['video'],
                                                    render: function(obj) {
                                                        return el(Button, {
                                                            onClick: obj.open,
                                                            variant: 'primary'
                                                        }, '🎬 Choisir une vidéo');
                                                    }
                                                })
                                            ),
                                            el('p', {
                                                style: { fontSize: '0.85em', color: '#666', marginTop: '0.5rem' }
                                            }, 'Formats supportés : MP4, WebM, MOV')
                                        )
                                )
                        ),
                        
                        el(PanelBody, { title: '🏛️ Masque vitrail', initialOpen: true },
                            attributes.vitrailMask?.url ?
                                el('div', { style: { marginBottom: '1rem' } },
                                    el('img', {
                                        src: attributes.vitrailMask.url,
                                        style: {
                                            width: '100%',
                                            maxHeight: '200px',
                                            objectFit: 'contain',
                                            borderRadius: '6px',
                                            background: '#f0f0f0'
                                        }
                                    }),
                                    el('div', { style: { marginTop: '0.5rem', textAlign: 'center' } },
                                        el('strong', {}, attributes.vitrailMask.filename),
                                        el('br'),
                                        el(Button, {
                                            onClick: function() { setAttributes({ vitrailMask: null }); },
                                            isDestructive: true,
                                            size: 'small',
                                            style: { marginTop: '0.5rem' }
                                        }, 'Changer le vitrail')
                                    )
                                ) :
                                el('div', { style: { textAlign: 'center', padding: '2rem', border: '2px dashed #ddd', borderRadius: '8px' } },
                                    el(MediaUploadCheck, {},
                                        el(MediaUpload, {
                                            onSelect: function(media) { setAttributes({ vitrailMask: media }); },
                                            allowedTypes: ['image'],
                                            render: function(obj) {
                                                return el(Button, {
                                                    onClick: obj.open,
                                                    variant: 'primary',
                                                    style: { marginBottom: '0.5rem' }
                                                }, '🏛️ Choisir le vitrail');
                                            }
                                        })
                                    ),
                                    el('p', {
                                        style: { fontSize: '0.85em', color: '#666', margin: 0 }
                                    }, 'Format PNG recommandé pour la transparence')
                                ),
                            
                            el(RangeControl, {
                                label: 'Opacité du masque (%)',
                                help: 'Plus l\\'opacité est élevée, plus le vitrail est visible',
                                value: attributes.maskOpacity,
                                onChange: function(value) { setAttributes({ maskOpacity: value }); },
                                min: 60,
                                max: 95,
                                step: 5
                            })
                        ),
                        
                        el(PanelBody, { title: '🔗 Bouton d\\'action', initialOpen: false },
                            el(TextControl, {
                                label: 'Texte du bouton',
                                value: attributes.ctaText,
                                onChange: function(value) { setAttributes({ ctaText: value }); }
                            }),
                            el(TextControl, {
                                label: 'URL du bouton',
                                value: attributes.ctaUrl,
                                onChange: function(value) { setAttributes({ ctaUrl: value }); },
                                placeholder: '#portfolio'
                            })
                        )
                    ),
                    
                    el('div', useBlockProps({
                        style: {
                            minHeight: '100vh',
                            background: currentVideoUrl ? 
                                'linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url(' + currentVideoUrl + ')' :
                                'linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%)',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                            position: 'relative',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            color: 'white',
                            overflow: 'hidden'
                        }
                    }),
                        // Masque vitrail en overlay
                        attributes.vitrailMask?.url && el('div', {
                            style: {
                                position: 'absolute',
                                top: 0,
                                left: 0,
                                right: 0,
                                bottom: 0,
                                backgroundImage: 'url(' + attributes.vitrailMask.url + ')',
                                backgroundSize: 'cover',
                                backgroundPosition: 'center',
                                backgroundRepeat: 'no-repeat',
                                opacity: attributes.maskOpacity / 100,
                                zIndex: 2,
                                mixBlendMode: 'multiply'
                            }
                        }),
                        
                        // Indicateur dans l'éditeur
                        !currentVideoUrl && el('div', {
                            style: {
                                position: 'absolute',
                                top: '1rem',
                                left: '1rem',
                                background: 'rgba(255,255,255,0.1)',
                                color: 'white',
                                padding: '0.5rem 1rem',
                                borderRadius: '20px',
                                fontSize: '0.85rem',
                                zIndex: 10
                            }
                        }, '📹 Ajoutez une vidéo dans les paramètres'),
                        
                        !attributes.vitrailMask && el('div', {
                            style: {
                                position: 'absolute',
                                top: '1rem',
                                right: '1rem',
                                background: 'rgba(255,255,255,0.1)',
                                color: 'white',
                                padding: '0.5rem 1rem',
                                borderRadius: '20px',
                                fontSize: '0.85rem',
                                zIndex: 10
                            }
                        }, '🏛️ Ajoutez un vitrail masque'),
                        
                        // Contenu principal
                        el('div', {
                            style: {
                                position: 'relative',
                                zIndex: 3,
                                textAlign: 'center',
                                maxWidth: '900px',
                                padding: '3rem 2rem',
                                background: 'rgba(0,0,0,0.2)',
                                borderRadius: '20px',
                                backdropFilter: 'blur(10px)',
                                border: '1px solid rgba(255,255,255,0.1)'
                            }
                        },
                            el(RichText, {
                                tagName: 'h1',
                                value: attributes.title,
                                onChange: function(value) { setAttributes({ title: value }); },
                                placeholder: 'Votre titre principal...',
                                style: {
                                    fontSize: 'clamp(2.5rem, 7vw, 5rem)',
                                    fontWeight: '700',
                                    marginBottom: '1.5rem',
                                    lineHeight: '1.1',
                                    textShadow: '0 4px 20px rgba(0,0,0,0.6)',
                                    background: 'linear-gradient(135deg, #ffffff 0%, #f0f9ff 50%, #dbeafe 100%)',
                                    WebkitBackgroundClip: 'text',
                                    WebkitTextFillColor: 'transparent',
                                    backgroundClip: 'text'
                                }
                            }),
                            el(RichText, {
                                tagName: 'p',
                                value: attributes.subtitle,
                                onChange: function(value) { setAttributes({ subtitle: value }); },
                                placeholder: 'Votre sous-titre contemplatif...',
                                style: {
                                    fontSize: 'clamp(1.2rem, 3.5vw, 1.6rem)',
                                    marginBottom: '3rem',
                                    opacity: '0.95',
                                    textShadow: '0 2px 10px rgba(0,0,0,0.6)',
                                    lineHeight: '1.6',
                                    fontStyle: 'italic'
                                }
                            }),
                            el('div', {
                                style: {
                                    display: 'inline-block',
                                    padding: '1.5rem 3rem',
                                    background: 'linear-gradient(135deg, rgba(59,130,246,0.9) 0%, rgba(37,99,235,0.9) 100%)',
                                    color: 'white',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.2rem',
                                    boxShadow: '0 15px 35px rgba(59, 130, 246, 0.4), 0 5px 15px rgba(0,0,0,0.1)',
                                    backdropFilter: 'blur(10px)',
                                    border: '1px solid rgba(255,255,255,0.2)',
                                    cursor: 'pointer',
                                    transition: 'all 0.3s ease'
                                }
                            }, attributes.ctaText)
                        )
                    )
                );
            },
            save: function(props) {
                var attributes = props.attributes;
                
                var currentVideoUrl = null;
                if (attributes.videoType === 'media' && attributes.videoMedia?.url) {
                    currentVideoUrl = attributes.videoMedia.url;
                } else if (attributes.videoType === 'url' && attributes.videoUrl) {
                    currentVideoUrl = attributes.videoUrl;
                }
                
                return el('div', useBlockProps.save({
                    className: 'hero-chapelle-simple',
                    style: {
                        minHeight: '100vh',
                        position: 'relative',
                        overflow: 'hidden'
                    }
                }),
                    // Vidéo de fond
                    currentVideoUrl && el('div', {
                        className: 'video-background',
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            width: '100%',
                            height: '100%',
                            zIndex: 1
                        }
                    },
                        currentVideoUrl.includes('youtube.com') || currentVideoUrl.includes('youtu.be') ?
                            el('iframe', {
                                src: 'https://www.youtube.com/embed/' + (currentVideoUrl.includes('youtu.be') ? 
                                    currentVideoUrl.split('/').pop() :
                                    currentVideoUrl.split('v=')[1]?.split('&')[0]) + '?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&iv_load_policy=3&playlist=' + (currentVideoUrl.includes('youtu.be') ? 
                                    currentVideoUrl.split('/').pop() :
                                    currentVideoUrl.split('v=')[1]?.split('&')[0]),
                                frameBorder: '0',
                                allow: 'autoplay; encrypted-media',
                                allowFullScreen: true,
                                style: {
                                    position: 'absolute',
                                    top: '50%',
                                    left: '50%',
                                    width: '100vw',
                                    height: '56.25vw',
                                    minHeight: '100vh',
                                    minWidth: '177.77vh',
                                    transform: 'translate(-50%, -50%)'
                                }
                            }) :
                            el('video', {
                                autoPlay: true,
                                muted: true,
                                loop: true,
                                playsInline: true,
                                style: {
                                    position: 'absolute',
                                    top: '50%',
                                    left: '50%',
                                    minWidth: '100%',
                                    minHeight: '100%',
                                    width: 'auto',
                                    height: 'auto',
                                    transform: 'translate(-50%, -50%)',
                                    objectFit: 'cover'
                                }
                            },
                                el('source', { src: currentVideoUrl, type: 'video/mp4' })
                            )
                    ),
                    
                    // Masque vitrail
                    attributes.vitrailMask?.url && el('div', {
                        className: 'vitrail-mask',
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            backgroundImage: 'url(' + attributes.vitrailMask.url + ')',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                            backgroundRepeat: 'no-repeat',
                            opacity: attributes.maskOpacity / 100,
                            zIndex: 2,
                            mixBlendMode: 'multiply'
                        }
                    }),
                    
                    // Contenu
                    el('div', {
                        className: 'hero-content',
                        style: {
                            position: 'relative',
                            zIndex: 3,
                            height: '100vh',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            color: 'white',
                            textAlign: 'center'
                        }
                    },
                        el('div', {
                            style: {
                                maxWidth: '900px',
                                padding: '3rem 2rem',
                                background: 'rgba(0,0,0,0.2)',
                                borderRadius: '20px',
                                backdropFilter: 'blur(10px)',
                                border: '1px solid rgba(255,255,255,0.1)'
                            }
                        },
                            el(RichText.Content, {
                                tagName: 'h1',
                                value: attributes.title,
                                style: {
                                    fontSize: 'clamp(2.5rem, 7vw, 5rem)',
                                    fontWeight: '700',
                                    marginBottom: '1.5rem',
                                    textShadow: '0 4px 20px rgba(0,0,0,0.6)'
                                }
                            }),
                            el(RichText.Content, {
                                tagName: 'p',
                                value: attributes.subtitle,
                                style: {
                                    fontSize: 'clamp(1.2rem, 3.5vw, 1.6rem)',
                                    marginBottom: '3rem',
                                    opacity: '0.95',
                                    textShadow: '0 2px 10px rgba(0,0,0,0.6)',
                                    fontStyle: 'italic'
                                }
                            }),
                            el('a', {
                                href: attributes.ctaUrl || '#portfolio',
                                style: {
                                    display: 'inline-block',
                                    padding: '1.5rem 3rem',
                                    background: 'linear-gradient(135deg, rgba(59,130,246,0.9) 0%, rgba(37,99,235,0.9) 100%)',
                                    color: 'white',
                                    borderRadius: '50px',
                                    fontWeight: '600',
                                    fontSize: '1.2rem',
                                    textDecoration: 'none',
                                    boxShadow: '0 15px 35px rgba(59, 130, 246, 0.4), 0 5px 15px rgba(0,0,0,0.1)',
                                    backdropFilter: 'blur(10px)',
                                    border: '1px solid rgba(255,255,255,0.2)',
                                    transition: 'all 0.3s ease'
                                }
                            }, attributes.ctaText)
                        )
                    )
                );
            }
        });
    })(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
    ";

    wp_add_inline_script('bigjucode-hero-simple', $hero_simple_js);
    wp_enqueue_script('bigjucode-hero-simple');
}
add_action('enqueue_block_editor_assets', 'bigjucode_hero_chapelle_simple');
