import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title, subtitle } = attributes;
    
    return (
        <div {...useBlockProps({
            style: {
                padding: '4rem 2rem',
                background: 'linear-gradient(135deg, #1e293b 0%, #334155 100%)',
                color: 'white',
                textAlign: 'center',
                minHeight: '400px',
                display: 'flex',
                flexDirection: 'column',
                justifyContent: 'center'
            }
        })}>
            <RichText
                tagName="h1"
                value={title}
                onChange={(value) => setAttributes({ title: value })}
                placeholder="Votre titre..."
                style={{ fontSize: '3rem', marginBottom: '1rem' }}
            />
            <RichText
                tagName="p"
                value={subtitle}
                onChange={(value) => setAttributes({ subtitle: value })}
                placeholder="Votre sous-titre..."
                style={{ fontSize: '1.2rem' }}
            />
        </div>
    );
}
