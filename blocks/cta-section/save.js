import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { title, description } = attributes;
    
    return (
        <div {...useBlockProps.save({
            style: {
                padding: '3rem 2rem',
                background: 'linear-gradient(135deg, #3b82f6 0%, #10b981 100%)',
                color: 'white',
                textAlign: 'center',
                borderRadius: '12px',
                margin: '2rem 0'
            }
        })}>
            <RichText.Content tagName="h2" value={title} style={{ fontSize: '2rem', marginBottom: '1rem' }} />
            <RichText.Content tagName="p" value={description} style={{ fontSize: '1.2rem', marginBottom: '2rem' }} />
            <a href="#contact" style={{
                display: 'inline-block',
                padding: '1rem 2rem',
                background: 'white',
                color: '#3b82f6',
                borderRadius: '50px',
                fontWeight: '600',
                textDecoration: 'none'
            }}>
                Contactez-moi
            </a>
        </div>
    );
}
