import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title, subtitle } = attributes;
    
    const blockProps = useBlockProps({
        className: 'bigjucode-services-section'
    });

    return (
        <div {...blockProps}>
            <div className="services-container">
                <div className="services-header">
                    <RichText
                        tagName="h2"
                        value={title}
                        onChange={(value) => setAttributes({ title: value })}
                        placeholder={__('Titre des services...', 'bigjucode')}
                        className="services-title"
                    />
                    <RichText
                        tagName="p"
                        value={subtitle}
                        onChange={(value) => setAttributes({ subtitle: value })}
                        placeholder={__('Sous-titre...', 'bigjucode')}
                        className="services-subtitle"
                    />
                </div>
                
                <div className="services-grid">
                    <div className="service-card">
                        <div className="service-icon">🚀</div>
                        <h3>Développement Web</h3>
                        <p>Sites web modernes et performants</p>
                    </div>
                    <div className="service-card">
                        <div className="service-icon">📱</div>
                        <h3>Applications Mobile</h3>
                        <p>Apps natives et hybrides</p>
                    </div>
                    <div className="service-card">
                        <div className="service-icon">💡</div>
                        <h3>Consulting</h3>
                        <p>Conseils techniques et stratégiques</p>
                    </div>
                </div>
            </div>
        </div>
    );
}
