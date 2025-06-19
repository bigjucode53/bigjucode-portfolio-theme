import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { title, subtitle } = attributes;
    
    return (
        <div {...useBlockProps.save({
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
            <RichText.Content tagName="h1" value={title} style={{ fontSize: '3rem', marginBottom: '1rem' }} />
            <RichText.Content tagName="p" value={subtitle} style={{ fontSize: '1.2rem' }} />
        </div>
    );
}
