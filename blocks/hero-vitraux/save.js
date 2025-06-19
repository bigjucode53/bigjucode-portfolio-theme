import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { 
        title, 
        subtitle, 
        videoUrl, 
        vitrail1, 
        vitrail2, 
        vitrail3, 
        vitrail4, 
        vitrail5, 
        vitrail6,
        showCTAButton,
        ctaText,
        ctaUrl,
        overlayOpacity
    } = attributes;
    
    const blockProps = useBlockProps.save({
        className: 'bigjucode-hero-vitraux'
    });

    // Fonction pour rendre un vitrail
    const renderVitrail = (vitrail, vitrailNumber) => {
        if (vitrail?.url) {
            return (
                <div className={`vitrail vitrail-${vitrailNumber}`} key={vitrailNumber}>
                    <img 
                        src={vitrail.url} 
                        alt={vitrail.alt || `Vitrail ${vitrailNumber}`}
                        loading="lazy"
                    />
                </div>
            );
        }
        return null;
    };

    // Fonction pour rendre la vidéo selon le type
    const renderVideoBackground = () => {
        if (!videoUrl) return null;

        if (videoUrl.includes('youtube.com')) {
            const videoId = videoUrl.split('v=')[1]?.split('&')[0] || videoUrl.split('/').pop();
            return (
                <iframe
                    src={`https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&iv_load_policy=3&playlist=${videoId}`}
                    frameBorder="0"
                    allow="autoplay; encrypted-media"
                    allowFullScreen
                    className="video-iframe"
                />
            );
        }

        if (videoUrl.includes('vimeo.com')) {
            const videoId = videoUrl.split('/').pop();
            return (
                <iframe
                    src={`https://player.vimeo.com/video/${videoId}?autoplay=1&muted=1&loop=1&background=1`}
                    frameBorder="0"
                    allow="autoplay; fullscreen"
                    allowFullScreen
                    className="video-iframe"
                />
            );
        }

        // Vidéo MP4 directe
        return (
            <video autoPlay muted loop playsInline className="video-direct">
                <source src={videoUrl} type="video/mp4" />
            </video>
        );
    };

    return (
        <div {...blockProps}>
            <div className="hero-container">
                {/* Fond vidéo */}
                <div className="video-background">
                    {renderVideoBackground()}
                    <div 
                        className="video-overlay" 
                        style={{ opacity: overlayOpacity / 100 }}
                    />
                </div>

                {/* Vitraux */}
                <div className="vitraux-container">
                    {/* Vitraux principaux (mobile + desktop) */}
                    {renderVitrail(vitrail1, 1)}
                    {renderVitrail(vitrail2, 2)}
                    
                    {/* Vitraux desktop uniquement */}
                    <div className="vitraux-desktop">
                        {renderVitrail(vitrail3, 3)}
                        {renderVitrail(vitrail4, 4)}
                    </div>
                    
                    {/* Vitraux grands écrans uniquement */}
                    <div className="vitraux-large">
                        {renderVitrail(vitrail5, 5)}
                        {renderVitrail(vitrail6, 6)}
                    </div>
                </div>

                {/* Contenu principal */}
                <div className="hero-content">
                    <RichText.Content
                        tagName="h1"
                        value={title}
                        className="hero-title"
                    />
                    <RichText.Content
                        tagName="p"
                        value={subtitle}
                        className="hero-subtitle"
                    />
                    
                    {showCTAButton && ctaText && (
                        <div className="hero-cta">
                            <a 
                                href={ctaUrl || '#'} 
                                className="cta-button"
                                role="button"
                            >
                                <RichText.Content
                                    tagName="span"
                                    value={ctaText}
                                />
                            </a>
                        </div>
                    )}
                </div>

                {/* Indicateur de scroll */}
                <div className="scroll-indicator">
                    <div className="scroll-arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    );
}