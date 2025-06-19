import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title, description } = attributes;
    
    const blockProps = useBlockProps({
        className: 'bigjucode-cta-section'
    });

    return (
        <div {...blockProps}>
            <div className="cta-content">
                <RichText
                    tagName="h2"
                    value={title}
                    onChange={(value) => setAttributes({ title: value })}
                    placeholder={__('Titre du CTA...', 'bigjucode')}
                    className="cta-title"
                />
                <RichText
                    tagName="p"
                    value={description}
                    onChange={(value) => setAttributes({ description: value })}
                    placeholder={__('Description...', 'bigjucode')}
                    className="cta-description"
                />
                <div className="cta-buttons">
                    <span className="btn btn-primary">Contactez-moi</span>
                    <span className="btn btn-secondary">Voir projets</span>
                </div>
            </div>
        </div>
    );
}
