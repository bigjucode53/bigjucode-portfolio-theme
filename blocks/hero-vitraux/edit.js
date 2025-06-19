import { useBlockProps, InspectorControls, RichText, MediaUpload } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();
    
    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Configuration Vidéo', 'bigjucode')}>
                    <TextControl
                        label={__('URL Vidéo de fond', 'bigjucode')}
                        value={attributes.videoUrl}
                        onChange={(value) => setAttributes({ videoUrl: value })}
                        help={__('URL MP4 pour la vidéo de fond', 'bigjucode')}
                    />
                </PanelBody>
                
                <PanelBody title={__('Vitraux (6 max)', 'bigjucode')}>
                    {[1,2,3,4,5,6].map(num => (
                        <div key={num} style={{ marginBottom: '15px' }}>
                            <MediaUpload
                                onSelect={(media) => setAttributes({ [`vitrail${num}`]: media })}
                                render={({ open }) => (
                                    <Button 
                                        onClick={open}
                                        variant="secondary"
                                        style={{ width: '100%', marginBottom: '5px' }}
                                    >
                                        {attributes[`vitrail${num}`]?.url ? 
                                            __(`Changer Vitrail ${num}`, 'bigjucode') : 
                                            __(`Ajouter Vitrail ${num}`, 'bigjucode')
                                        }
                                    </Button>
                                )}
                            />
                            {attributes[`vitrail${num}`]?.url && (
                                <img 
                                    src={attributes[`vitrail${num}`].url} 
                                    style={{ width: '100%', height: '60px', objectFit: 'cover', borderRadius: '4px' }}
                                    alt={`Vitrail ${num}`}
                                />
                            )}
                        </div>
                    ))}
                </PanelBody>
            </InspectorControls>
            
            <div {...blockProps}>
                <div style={{ 
                    minHeight: '400px', 
                    background: 'linear-gradient(45deg, #3b82f6, #10b981)',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    color: 'white',
                    textAlign: 'center',
                    position: 'relative',
                    borderRadius: '8px'
                }}>
                    <div style={{ padding: '2rem' }}>
                        <RichText
                            tagName="h1"
                            value={attributes.title}
                            onChange={(value) => setAttributes({ title: value })}
                            placeholder={__('Titre du hero...', 'bigjucode')}
                            style={{ fontSize: '2.5rem', marginBottom: '1rem' }}
                        />
                        <RichText
                            tagName="p" 
                            value={attributes.subtitle}
                            onChange={(value) => setAttributes({ subtitle: value })}
                            placeholder={__('Sous-titre...', 'bigjucode')}
                            style={{ fontSize: '1.2rem' }}
                        />
                        
                        <div style={{ marginTop: '1.5rem' }}>
                            <button style={{
                                background: 'rgba(255,255,255,0.2)',
                                color: 'white',
                                border: 'none',
                                padding: '12px 24px',
                                borderRadius: '25px',
                                marginRight: '10px',
                                cursor: 'pointer'
                            }}>
                                ⛪ Découvrir mes Créations
                            </button>
                            <button style={{
                                background: 'transparent',
                                color: 'white',
                                border: '2px solid rgba(255,255,255,0.4)',
                                padding: '10px 22px',
                                borderRadius: '25px',
                                cursor: 'pointer'
                            }}>
                                🙏 Commencer une Collaboration
                            </button>
                        </div>
                    </div>
                </div>
                
                <div style={{ 
                    padding: '10px', 
                    background: '#f0f9ff', 
                    fontSize: '12px', 
                    color: '#1e40af',
                    borderRadius: '0 0 8px 8px'
                }}>
                    ℹ️ Aperçu éditeur - Configurez la vidéo et les vitraux via les panels de droite →
                </div>
            </div>
        </>
    );
}
