import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { title, description } = attributes;
    
    const blockProps = useBlockProps.save({
        className: 'bigjucode-cta-section'
    });

    return (
        <div {...blockProps}>
            <div className="cta-content">
                <RichText.Content
                    tagName="h2"
                    value={title}
                    className="cta-title"
                />
                <RichText.Content
                    tagName="p"
                    value={description}
                    className="cta-description"
                />
                <div className="cta-buttons">
                    <a href="#contact" className="btn btn-primary">Contactez-moi</a>
                    <a href="#portfolio" className="btn btn-secondary">Voir projets</a>
                </div>
            </div>
        </div>
    );
}
