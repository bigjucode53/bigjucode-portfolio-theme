import { __ } from '@wordpress/i18n';
import { 
    useBlockProps, 
    InspectorControls,
    RichText,
    MediaUpload,
    MediaUploadCheck
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    TextControl,
    Button,
    ResponsiveWrapper,
    ToggleControl,
    RangeControl
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
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
    
    const blockProps = useBlockProps({
        className: 'bigjucode-hero-vitraux'
    });

    // Fonction pour rendre l'aperçu d'un vitrail
    const renderVitrailPreview = (vitrail, vitrailNumber) => {
        if (vitrail?.url) {
            return (
                <div className={`vitrail vitrail-${vitrailNumber}`}>
                    <img src={vitrail.url} alt={vitrail.alt || `Vitrail ${vitrailNumber}`} />
                </div>
            );
        }
        return (
            <div className={`vitrail vitrail-${vitrailNumber} vitrail-placeholder`}>
                <span>Vitrail {vitrailNumber}</span>
            </div>
        );
    };

    // Fonction pour rendre le sélecteur de média
    const renderMediaUpload = (vitrail, vitrailNumber, attributeName) => (
        <MediaUploadCheck>
            <MediaUpload
                onSelect={(media) => setAttributes({ [attributeName]: media })}
                allowedTypes={['image']}
                value={vitrail?.id}
                render={({ open }) => (
                    <div className="vitrail-control">
                        <div className="vitrail-preview">
                            {vitrail?.url ? (
                                <img src={vitrail.url} alt={`Vitrail ${vitrailNumber}`} />
                            ) : (
                                <div className="placeholder">
                                    <span>Vitrail {vitrailNumber}</span>
                                </div>
                            )}
                        </div>
                        <div className="vitrail-actions">
                            <Button onClick={open} variant="secondary" size="small">
                                {vitrail?.url ? 'Changer' : 'Sélectionner'}
                            </Button>
                            {vitrail?.url && (
                                <Button 
                                    onClick={() => setAttributes({ [attributeName]: null })}
                                    variant="tertiary" 
                                    size="small"
                                    isDestructive
                                >
                                    Supprimer
                                </Button>
                            )}
                        </div>
                    </div>
                )}
            />
        </MediaUploadCheck>
    );

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Vidéo de fond', 'bigjucode')} initialOpen={true}>
                    <TextControl
                        label={__('URL de la vidéo', 'bigjucode')}
                        help={__('URL MP4 ou lien YouTube/Vimeo', 'bigjucode')}
                        value={videoUrl}
                        onChange={(value) => setAttributes({ videoUrl: value })}
                        placeholder="https://example.com/video.mp4"
                    />
                    <RangeControl
                        label={__('Opacité de l\'overlay', 'bigjucode')}
                        value={overlayOpacity}
                        onChange={(value) => setAttributes({ overlayOpacity: value })}
                        min={0}
                        max={100}
                        step={5}
                    />
                </PanelBody>

                <PanelBody title={__('Vitraux (Images PNG)', 'bigjucode')} initialOpen={false}>
                    <p><strong>{__('Vitraux principaux (toujours affichés)', 'bigjucode')}</strong></p>
                    {renderMediaUpload(vitrail1, 1, 'vitrail1')}
                    {renderMediaUpload(vitrail2, 2, 'vitrail2')}
                    
                    <p><strong>{__('Vitraux supplémentaires (desktop)', 'bigjucode')}</strong></p>
                    {renderMediaUpload(vitrail3, 3, 'vitrail3')}
                    {renderMediaUpload(vitrail4, 4, 'vitrail4')}
                    
                    <p><strong>{__('Vitraux pour grands écrans', 'bigjucode')}</strong></p>
                    {renderMediaUpload(vitrail5, 5, 'vitrail5')}
                    {renderMediaUpload(vitrail6, 6, 'vitrail6')}
                </PanelBody>

                <PanelBody title={__('Bouton d\'action', 'bigjucode')} initialOpen={false}>
                    <ToggleControl
                        label={__('Afficher le bouton', 'bigjucode')}
                        checked={showCTAButton}
                        onChange={(value) => setAttributes({ showCTAButton: value })}
                    />
                    {showCTAButton && (
                        <>
                            <TextControl
                                label={__('Texte du bouton', 'bigjucode')}
                                value={ctaText}
                                onChange={(value) => setAttributes({ ctaText: value })}
                            />
                            <TextControl
                                label={__('URL du bouton', 'bigjucode')}
                                value={ctaUrl}
                                onChange={(value) => setAttributes({ ctaUrl: value })}
                                placeholder="#contact"
                            />
                        </>
                    )}
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <div className="hero-container">
                    {/* Fond vidéo */}
                    <div className="video-background">
                        {videoUrl ? (
                            videoUrl.includes('youtube.com') || videoUrl.includes('vimeo.com') ? (
                                <div className="video-placeholder">
                                    <p>🎥 Vidéo: {videoUrl}</p>
                                    <small>L'embed sera affiché sur le frontend</small>
                                </div>
                            ) : (
                                <video autoPlay muted loop>
                                    <source src={videoUrl} type="video/mp4" />
                                </video>
                            )
                        ) : (
                            <div className="video-placeholder">
                                <p>📹 Ajoutez une URL vidéo dans les paramètres</p>
                            </div>
                        )}
                        <div 
                            className="video-overlay" 
                            style={{ opacity: overlayOpacity / 100 }}
                        />
                    </div>

                    {/* Vitraux */}
                    <div className="vitraux-container">
                        {renderVitrailPreview(vitrail1, 1)}
                        {renderVitrailPreview(vitrail2, 2)}
                        <div className="vitraux-desktop">
                            {renderVitrailPreview(vitrail3, 3)}
                            {renderVitrailPreview(vitrail4, 4)}
                        </div>
                        <div className="vitraux-large">
                            {renderVitrailPreview(vitrail5, 5)}
                            {renderVitrailPreview(vitrail6, 6)}
                        </div>
                    </div>

                    {/* Contenu principal */}
                    <div className="hero-content">
                        <RichText
                            tagName="h1"
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                            placeholder={__('Votre titre principal...', 'bigjucode')}
                            className="hero-title"
                        />
                        <RichText
                            tagName="p"
                            value={subtitle}
                            onChange={(value) => setAttributes({ subtitle: value })}
                            placeholder={__('Votre sous-titre...', 'bigjucode')}
                            className="hero-subtitle"
                        />
                        
                        {showCTAButton && (
                            <div className="hero-cta">
                                <RichText
                                    tagName="span"
                                    value={ctaText}
                                    onChange={(value) => setAttributes({ ctaText: value })}
                                    placeholder={__('Texte du bouton...', 'bigjucode')}
                                    className="cta-button"
                                />
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </>
    );
}