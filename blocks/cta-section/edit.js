import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title, description } = attributes;
    
    return (
        <div {...useBlockProps({
            style: {
                padding: '3rem 2rem',
                background: 'linear-gradient(135deg, #3b82f6 0%, #10b981 100%)',
                color: 'white',
                textAlign: 'center',
                borderRadius: '12px',
                margin: '2rem 0'
            }
        })}>
            <RichText
                tagName="h2"
                value={title}
                onChange={(value) => setAttributes({ title: value })}
                placeholder="Titre du CTA..."
                style={{ fontSize: '2rem', marginBottom: '1rem' }}
            />
            <RichText
                tagName="p"
                value={description}
                onChange={(value) => setAttributes({ description: value })}
                placeholder="Description..."
                style={{ fontSize: '1.2rem', marginBottom: '2rem' }}
            />
            <div style={{
                display: 'inline-block',
                padding: '1rem 2rem',
                background: 'white',
                color: '#3b82f6',
                borderRadius: '50px',
                fontWeight: '600'
            }}>
                Contactez-moi
            </div>
        </div>
    );
}
