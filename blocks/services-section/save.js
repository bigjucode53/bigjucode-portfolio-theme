import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { title, subtitle } = attributes;
    
    const blockProps = useBlockProps.save({
        className: 'bigjucode-services-section'
    });

    return (
        <div {...blockProps}>
            <div className="services-container">
                <div className="services-header">
                    <RichText.Content
                        tagName="h2"
                        value={title}
                        className="services-title"
                    />
                    <RichText.Content
                        tagName="p"
                        value={subtitle}
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
