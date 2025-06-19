import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title } = attributes;
    
    return (
        <div {...useBlockProps({
            style: { padding: '4rem 2rem', background: '#f8fafc', textAlign: 'center' }
        })}>
            <RichText
                tagName="h2"
                value={title}
                onChange={(value) => setAttributes({ title: value })}
                placeholder="Titre des services..."
                style={{ fontSize: '2.5rem', marginBottom: '2rem', color: '#1e293b' }}
            />
            <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))', gap: '2rem' }}>
                <div style={{ background: 'white', padding: '2rem', borderRadius: '12px' }}>
                    <div style={{ fontSize: '3rem', marginBottom: '1rem' }}>🚀</div>
                    <h3>Développement Web</h3>
                    <p>Sites modernes et performants</p>
                </div>
                <div style={{ background: 'white', padding: '2rem', borderRadius: '12px' }}>
                    <div style={{ fontSize: '3rem', marginBottom: '1rem' }}>📱</div>
                    <h3>Apps Mobile</h3>
                    <p>Applications natives</p>
                </div>
                <div style={{ background: 'white', padding: '2rem', borderRadius: '12px' }}>
                    <div style={{ fontSize: '3rem', marginBottom: '1rem' }}>💡</div>
                    <h3>Consulting</h3>
                    <p>Conseils techniques</p>
                </div>
            </div>
        </div>
    );
}
