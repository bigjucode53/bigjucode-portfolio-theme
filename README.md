# 🚀 Bigjucode Portfolio - Thème WordPress FSE avec Blocs Personnalisés

> Thème WordPress Full Site Editing moderne avec blocs Gutenberg personnalisés pour portfolio de développeur

![Version](https://img.shields.io/badge/version-2.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple.svg)
![FSE](https://img.shields.io/badge/FSE-Full%20Site%20Editing-green.svg)
![Gutenberg](https://img.shields.io/badge/Gutenberg-Custom%20Blocks-orange.svg)

## 🎯 Vue d'ensemble

**Bigjucode Portfolio v2** révolutionne l'expérience de création avec des **blocs Gutenberg personnalisés** offrant une interface d'édition intuitive similaire aux blocs WordPress natifs.

### 🌟 Nouveautés v2.0
- **🧩 Blocs personnalisés** avec interface d'édition native
- **⚙️ Panels de configuration** intégrés à droite
- **👁️ Aperçu en temps réel** dans l'éditeur
- **🎨 Customisation avancée** sans code

### ✨ Caractéristiques principales
- **100% FSE** : Édition complète via Gutenberg
- **Blocs sur mesure** : Hero Vitraux, Services, CTA personnalisés
- **Interface native** : Comme les blocs WordPress standards
- **Performance optimisée** : Code léger et rapide
- **Mobile-first** : Responsive parfait

## 🧩 Blocs Personnalisés

### **🏛️ Hero Vitraux**
Bloc d'en-tête avec vitraux d'église et vidéo de fond
- **Panel vidéo** : URL personnalisable
- **Panel vitraux** : 6 images uploadables via médiathèque
- **Panel contenu** : Titre, sous-titre, boutons
- **Responsive** : 2-6 vitraux selon l'écran

### **⚡ Services Section**
Grille de services avec icônes et descriptions
- **Panel services** : Jusqu'à 6 services
- **Panel design** : Couleurs, espacements, animations
- **Panel contenu** : Titres, descriptions, boutons

### **🎯 Call to Action**
Section d'appel à l'action avec gradient
- **Panel design** : Couleurs de fond, gradients
- **Panel contenu** : Titre, description, boutons
- **Panel contact** : Informations de contact

## 📁 Structure du projet

```
bigjucode-theme/
├── 📄 style.css                    # En-tête du thème
├── 📄 index.php                    # Fallback PHP  
├── 📄 functions.php                # Hooks WordPress
├── 📄 theme.json                   # Configuration FSE
├── 📄 README.md                    # Documentation
│
├── 📁 templates/                   # Templates FSE
│   ├── 📄 index.html              # Template de base
│   ├── 📄 front-page.html         # Page d'accueil
│   └── 📄 page.html               # Pages statiques
│
├── 📁 parts/                      # Template parts
│   ├── 📄 header.html             # En-tête
│   └── 📄 footer.html             # Pied de page
│
├── 📁 blocks/                     # 🆕 Blocs personnalisés
│   ├── 📁 hero-vitraux/
│   │   ├── 📄 block.json          # Configuration du bloc
│   │   ├── 📄 edit.js             # Interface d'édition
│   │   ├── 📄 save.js             # Rendu frontend
│   │   ├── 📄 style.css           # Styles frontend
│   │   └── 📄 editor.css          # Styles éditeur
│   │
│   ├── 📁 services-section/
│   │   ├── 📄 block.json
│   │   ├── 📄 edit.js
│   │   ├── 📄 save.js
│   │   ├── 📄 style.css
│   │   └── 📄 editor.css
│   │
│   └── 📁 cta-section/
│       ├── 📄 block.json
│       ├── 📄 edit.js
│       ├── 📄 save.js
│       ├── 📄 style.css
│       └── 📄 editor.css
│
├── 📁 assets/                     # Ressources
│   ├── 📁 css/
│   │   ├── 📄 main.css           # Styles principaux
│   │   ├── 📄 editor-style.css   # Styles éditeur
│   │   └── 📄 admin.css          # Styles admin
│   ├── 📁 js/
│   │   ├── 📄 main.js            # JavaScript principal
│   │   └── 📄 blocks.js          # 🆕 Script blocs
│   └── 📁 images/                # Images du thème
│
├── 📁 inc/                       # Fichiers PHP
│   ├── 📄 blocks.php            # 🆕 Enregistrement blocs
│   ├── 📄 customizer.php        # Customizer
│   └── 📄 template-functions.php # Fonctions
│
└── 📁 languages/                 # Traductions
```

## ⚙️ Interface d'édition

### **🎨 Expérience utilisateur**
Chaque bloc offre une interface similaire aux blocs WordPress natifs :

**Zone d'aperçu (gauche)** :
- Rendu en temps réel du bloc
- Interactions directes possibles
- Aperçu responsive

**Panels de configuration (droite)** :
- **Panel Contenu** : Textes, liens, boutons
- **Panel Média** : Images, vidéos, icônes  
- **Panel Design** : Couleurs, espacements, animations
- **Panel Avancé** : CSS personnalisé, attributs

### **📱 Responsive intégré**
- **Mobile** : Interface adaptée tactile
- **Tablet** : Optimisations spécifiques
- **Desktop** : Expérience complète

## 🚀 Installation et configuration

### Installation
```bash
# Cloner le repository
git clone https://github.com/bigjucode53/bigjucode-portfolio-theme.git

# Aller dans le dossier
cd bigjucode-portfolio-theme

# Installer les dépendances (si build process)
npm install

# Build des blocs (si nécessaire)
npm run build
```

### Activation
1. Copier dans `/wp-content/themes/bigjucode-theme/`
2. **Apparence > Thèmes** → Activer
3. **Apparence > Éditeur de site** → Utiliser les blocs

## 🛠️ Développement de blocs

### Structure d'un bloc
```javascript
// blocks/hero-vitraux/edit.js
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, MediaUpload } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();
    
    return (
        <>
            {/* Panels de configuration (droite) */}
            <InspectorControls>
                <PanelBody title="Configuration Vidéo">
                    <TextControl
                        label="URL Vidéo"
                        value={attributes.videoUrl}
                        onChange={(value) => setAttributes({ videoUrl: value })}
                    />
                </PanelBody>
                
                <PanelBody title="Vitraux">
                    <MediaUpload
                        onSelect={(media) => setAttributes({ vitrail1: media })}
                        render={({ open }) => (
                            <Button onClick={open}>
                                Choisir Vitrail 1
                            </Button>
                        )}
                    />
                </PanelBody>
            </InspectorControls>
            
            {/* Aperçu (gauche) */}
            <div {...blockProps}>
                <div className="hero-preview">
                    {/* Rendu d'aperçu du bloc */}
                </div>
            </div>
        </>
    );
}
```

### Build process
```bash
# Développement avec watch
npm run dev

# Build production
npm run build

# Linter
npm run lint
```

## 🎯 Utilisation

### **Créer une page**
1. **Pages > Ajouter**
2. **Cliquer sur +** pour ajouter un bloc
3. **Catégorie "Bigjucode"** → Choisir votre bloc
4. **Configurer** via les panels de droite
5. **Publier**

### **Blocs disponibles**
- **🏛️ Hero Vitraux** : Bannière principale
- **⚡ Services** : Présentation des services  
- **🎯 CTA** : Appel à l'action
- *(Plus de blocs à venir)*

## 🔧 Personnalisation avancée

### **CSS personnalisé**
```css
/* Cibler un bloc spécifique */
.wp-block-bigjucode-hero-vitraux {
    /* Vos styles */
}

/* Variables CSS disponibles */
:root {
    --bigjucode-primary: #3b82f6;
    --bigjucode-secondary: #10b981;
    --bigjucode-accent: #f59e0b;
}
```

### **Hooks PHP disponibles**
```php
// Modifier les attributs d'un bloc
add_filter('bigjucode_hero_vitraux_attributes', function($attributes) {
    // Vos modifications
    return $attributes;
});

// Ajouter des styles personnalisés
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('my-custom-blocks', get_stylesheet_directory_uri() . '/custom-blocks.css');
});
```

## 📊 Performance

### **Optimisations intégrées**
- ✅ **Lazy loading** des ressources
- ✅ **Code splitting** par bloc
- ✅ **Minification** automatique
- ✅ **Cache** intelligent
- ✅ **Core Web Vitals** optimisés

### **Métriques cibles**
- **LCP** : < 2.5s
- **FID** : < 100ms  
- **CLS** : < 0.1
- **Performance Score** : > 90

## 🤝 Contribution

### **Créer un nouveau bloc**
```bash
# Scaffold d'un nouveau bloc
npm run create-block mon-nouveau-bloc

# Structure générée automatiquement
blocks/mon-nouveau-bloc/
├── block.json
├── edit.js
├── save.js
├── style.css
└── editor.css
```

### **Guidelines de développement**
- **Code** : WordPress Coding Standards
- **JavaScript** : ESLint + Prettier
- **CSS** : BEM methodology
- **Git** : Conventional Commits

## 📈 Roadmap v2.1

- [ ] **🎨 Block Variations** : Variations de style par bloc
- [ ] **🔄 Block Transforms** : Conversion entre blocs
- [ ] **📱 Mobile Editor** : Interface mobile optimisée
- [ ] **🌐 Traductions** : Support multilingue complet
- [ ] **🎭 Animations** : Système d'animations avancé
- [ ] **📊 Analytics** : Tracking d'utilisation des blocs

## 📞 Support

- **📧 Email** : contact@bigjucode.com
- **🐛 Issues** : [GitHub Issues](https://github.com/bigjucode53/bigjucode-portfolio-theme/issues)
- **📖 Documentation** : [Wiki complet](https://github.com/bigjucode53/bigjucode-portfolio-theme/wiki)
- **💬 Discord** : [Communauté Bigjucode](#)

---

## 🏆 Crédits

Développé avec ❤️ par **[Bigjucode](https://bigjucode.com)**

*Révolutionnons ensemble l'expérience WordPress !*

---

**Version 2.0.0** - Janvier 2025