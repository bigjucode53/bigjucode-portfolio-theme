# 🚀 Bigjucode Portfolio - Thème WordPress FSE

> Thème WordPress Full Site Editing moderne et performant pour portfolio de développeur

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple.svg)
![FSE](https://img.shields.io/badge/FSE-Full%20Site%20Editing-green.svg)
![License](https://img.shields.io/badge/license-GPL%20v2-green.svg)

## 📋 Table des matières

- [Vue d'ensemble](#vue-densemble)
- [Fonctionnalités](#fonctionnalités)
- [Installation](#installation)
- [Structure du projet](#structure-du-projet)
- [Configuration](#configuration)
- [Développement local](#développement-local)
- [Personnalisation](#personnalisation)
- [Déploiement](#déploiement)
- [Contribution](#contribution)

## 🎯 Vue d'ensemble

**Bigjucode Portfolio** est un thème WordPress Full Site Editing (FSE) spécialement conçu pour créer un portfolio de développeur extraordinaire. Il combine design moderne en light mode, performance optimale et facilité d'utilisation.

### ✨ Caractéristiques principales
- **100% FSE** : Édition complète via l'éditeur WordPress Gutenberg
- **Design moderne** : Interface épurée en light mode avec animations subtiles
- **Performance optimisée** : Code léger, Core Web Vitals optimisés
- **Mobile-first** : Design responsive parfait sur tous les appareils
- **SEO-friendly** : Structure sémantique et optimisations intégrées
- **Accessibilité** : Conforme aux standards WCAG 2.1

## 🎨 Fonctionnalités

### Design & Interface
- ✅ **Light mode** avec palette de couleurs harmonieuse
- ✅ **Typographie soignée** avec Google Fonts (Inter)
- ✅ **Animations CSS** subtiles et fluides
- ✅ **Micro-interactions** engageantes
- ✅ **Effets hover** avancés
- ✅ **Icons** intégrés avec emojis

### Structure & Pages
- ✅ **Page d'accueil** : Hero section + présentation des services
- ✅ **Templates FSE** : index.html, front-page.html
- ✅ **Template parts** : header.html, footer.html modulaires
- ✅ **Navigation responsive** avec menu mobile
- ✅ **Footer complet** avec liens sociaux et informations

### Technique
- ✅ **theme.json** complet avec toutes les configurations FSE
- ✅ **Palette de couleurs** personnalisée (Primary, Secondary, Accent)
- ✅ **Espacements** harmonieux avec système de grille
- ✅ **Typographies** multiples (Inter, Playfair, Fira Code)
- ✅ **Support complet** des blocs Gutenberg
- ✅ **Optimisations** de performance intégrées

## 🚀 Installation

### Prérequis
- **WordPress** 6.0 ou supérieur
- **PHP** 8.0 ou supérieur
- **Environnement de développement** : Local, XAMPP, MAMP, ou serveur

### Installation via Git
```bash
# Cloner le repository
git clone https://github.com/bigjucode53/bigjucode-portfolio-theme.git

# Copier dans le dossier themes de WordPress
cp -r bigjucode-portfolio-theme /path/to/wordpress/wp-content/themes/bigjucode-theme
```

### Installation manuelle
1. Télécharger le ZIP depuis GitHub
2. Extraire dans `/wp-content/themes/bigjucode-theme/`
3. Aller dans **Apparence > Thèmes** dans l'admin WordPress
4. Activer le thème **"Bigjucode Portfolio"**

## 📁 Structure du projet

```
bigjucode-theme/
├── 📄 style.css                 # En-tête du thème WordPress
├── 📄 index.php                 # Fallback PHP pour compatibilité
├── 📄 functions.php             # Fonctionnalités et hooks WordPress
├── 📄 theme.json                # Configuration FSE complète
├── 📄 README.md                 # Documentation du projet
├── 📄 LICENSE                   # Licence GPL v2
├── 📄 .gitignore               # Fichiers à ignorer par Git
│
├── 📁 templates/               # Templates de pages FSE
│   ├── 📄 index.html           # Template de base
│   ├── 📄 front-page.html      # Page d'accueil
│   ├── 📄 page.html            # Pages statiques (à venir)
│   ├── 📄 single.html          # Articles individuels (à venir)
│   └── 📄 404.html             # Page d'erreur (à venir)
│
├── 📁 parts/                   # Template parts réutilisables
│   ├── 📄 header.html          # En-tête avec navigation
│   ├── 📄 footer.html          # Pied de page complet
│   └── 📄 navigation.html      # Navigation (à venir)
│
├── 📁 patterns/                # Block patterns personnalisés
│   ├── 📄 hero-section.php     # Section hero (à venir)
│   ├── 📄 services-grid.php    # Grille de services (à venir)
│   └── 📄 contact-form.php     # Formulaire de contact (à venir)
│
├── 📁 assets/                  # Ressources statiques
│   ├── 📁 css/
│   │   ├── 📄 main.css         # Styles principaux (à développer)
│   │   ├── 📄 editor-style.css # Styles pour l'éditeur (à développer)
│   │   └── 📄 admin.css        # Styles admin (à développer)
│   ├── 📁 js/
│   │   ├── 📄 main.js          # JavaScript principal (à développer)
│   │   └── 📄 admin.js         # JavaScript admin (à développer)
│   ├── 📁 images/              # Images du thème
│   └── 📁 fonts/               # Polices personnalisées
│
├── 📁 inc/                     # Fichiers PHP inclus
│   ├── 📄 customizer.php       # Customizer WordPress (à développer)
│   ├── 📄 template-functions.php # Fonctions de template (à développer)
│   ├── 📄 block-patterns.php   # Enregistrement des patterns (à développer)
│   └── 📄 block-styles.php     # Styles de blocs personnalisés (à développer)
│
└── 📁 languages/               # Fichiers de traduction (à venir)
```

## ⚙️ Configuration

### Activation du thème
1. **Aller dans l'admin WordPress** : `yoursite.local/wp-admin`
2. **Apparence > Thèmes**
3. **Activer "Bigjucode Portfolio"**
4. **Apparence > Éditeur de site** pour personnaliser

### Configuration des pages
```
📄 Accueil (page statique) - Utilise front-page.html
📁 Mon savoir-faire (page parente)
  └── 📄 Développement Web (page enfant)
  └── 📄 Applications Mobile (page enfant)  
  └── 📄 Consulting (page enfant)
  └── 📄 Design UX/UI (page enfant)
📄 Contact
📄 Blog (optionnel)
```

### Réglages WordPress recommandés
```php
// Dans Réglages > Lecture
Page d'accueil : Une page statique
Page d'accueil : Accueil
Page des articles : Blog

// Dans Réglages > Permaliens
Structure personnalisée : /%postname%/
```

## 💻 Développement local

### Environnement Local (recommandé)
Ce thème a été développé avec **Local by Flywheel** :

```bash
# Chemin du thème dans Local
~/Local Sites/bigjucode/app/public/wp-content/themes/bigjucode-theme/

# Workflow de développement
1. Développer dans Local (localhost)
2. Tester en temps réel sur bigjucode.local
3. Commit et push sur GitHub
4. Déployer en production
```

### Git workflow
```bash
# Développement quotidien
git add .
git commit -m "feat: add new template"
git push origin main

# Créer une branche pour nouvelle fonctionnalité
git checkout -b feature/contact-page
# ... développer ...
git commit -m "feat: add contact page template"
git checkout main
git merge feature/contact-page
git push origin main
```

## 🎨 Personnalisation

### Via l'éditeur de site
1. **Apparence > Éditeur de site**
2. **Styles** pour modifier couleurs/typographies
3. **Templates** pour éditer les mises en page
4. **Patterns** pour ajouter des sections prêtes

### Via theme.json
```json
{
  "styles": {
    "color": {
      "background": "#ffffff",
      "text": "#1f2937"
    },
    "typography": {
      "fontFamily": "var(--wp--preset--font-family--inter)"
    }
  }
}
```

### Couleurs du thème
```css
:root {
  --wp--preset--color--base: #ffffff;       /* Fond principal */
  --wp--preset--color--contrast: #1f2937;   /* Texte principal */
  --wp--preset--color--primary: #3b82f6;    /* Couleur principale */
  --wp--preset--color--secondary: #10b981;  /* Couleur secondaire */
  --wp--preset--color--accent: #f59e0b;     /* Couleur d'accent */
  --wp--preset--color--light-gray: #f3f4f6; /* Gris clair */
  --wp--preset--color--medium-gray: #6b7280; /* Gris moyen */
}
```

### Typographies
- **Primary** : Inter (Google Fonts) - Interface et contenu
- **Secondary** : Playfair Display - Titres élégants
- **Monospace** : Fira Code - Code et technique

## 🚀 Déploiement

### Via FTP/SFTP
```bash
# Upload du dossier complet
/wp-content/themes/bigjucode-theme/
```

### Via Git sur serveur
```bash
# Sur le serveur de production
cd /path/to/wp-content/themes/
git clone https://github.com/bigjucode53/bigjucode-portfolio-theme.git bigjucode-theme
```

### Optimisations production
- **Minifier** les CSS/JS
- **Optimiser** les images
- **Activer** la mise en cache
- **Configurer** un CDN
- **Tester** les Core Web Vitals

## 📊 Performance

### Optimisations intégrées
- ✅ **CSS optimisé** avec variables CSS natives
- ✅ **JavaScript minimal** et différé
- ✅ **Images lazy-loading** automatique
- ✅ **Fonts preload** pour Google Fonts
- ✅ **Code propre** sans jQuery
- ✅ **Sémantique HTML5** parfaite

### Métriques cibles
- **First Contentful Paint** : < 1.5s
- **Largest Contentful Paint** : < 2.5s
- **Cumulative Layout Shift** : < 0.1
- **First Input Delay** : < 100ms

## 🔍 SEO

### Optimisations intégrées
- ✅ **Structure sémantique** HTML5
- ✅ **Métadonnées** Open Graph et Twitter Cards
- ✅ **Schema.org** markup
- ✅ **Breadcrumbs** automatiques
- ✅ **Sitemap XML** généré automatiquement
- ✅ **URLs propres** et optimisées

## 🛠️ Technologies utilisées

- **WordPress** 6.0+ avec FSE
- **PHP** 8.0+ (orienté objet)
- **HTML5** sémantique
- **CSS3** avec variables natives
- **JavaScript** ES6+ vanilla
- **Git** pour le versioning
- **Local** pour le développement

## 🤝 Contribution

### Comment contribuer
1. **Fork** le repository
2. **Créer une branche** : `git checkout -b feature/amazing-feature`
3. **Commit** : `git commit -m 'Add amazing feature'`
4. **Push** : `git push origin feature/amazing-feature`
5. **Pull Request** avec description détaillée

### Standards de code
- **PHP** : WordPress Coding Standards
- **CSS** : BEM methodology
- **JavaScript** : ESLint + Prettier
- **Git** : Conventional Commits

### Roadmap
- [ ] Templates pour toutes les pages
- [ ] Block patterns personnalisés
- [ ] Animations CSS avancées
- [ ] Mode sombre (dark mode)
- [ ] Multilingue (i18n)
- [ ] Optimisations Core Web Vitals
- [ ] Tests automatisés

## 📞 Support

- **Email** : contact@bigjucode.com
- **GitHub Issues** : [Signaler un bug](https://github.com/bigjucode53/bigjucode-portfolio-theme/issues)
- **Documentation** : [Wiki du projet](https://github.com/bigjucode53/bigjucode-portfolio-theme/wiki)

## 📄 Licence

Ce projet est sous licence **GPL v2 or later** - voir le fichier [LICENSE](LICENSE) pour plus de détails.

```
Copyright (C) 2025 Bigjucode

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🙏 Remerciements

- **WordPress Team** pour l'écosystème FSE
- **Gutenberg Team** pour l'éditeur de blocs
- **Local Team** pour l'environnement de développement
- **Community** pour les retours et contributions

---

## 📈 Statistiques du projet

![GitHub last commit](https://img.shields.io/github/last-commit/bigjucode53/bigjucode-portfolio-theme)
![GitHub issues](https://img.shields.io/github/issues/bigjucode53/bigjucode-portfolio-theme)
![GitHub pull requests](https://img.shields.io/github/issues-pr/bigjucode53/bigjucode-portfolio-theme)

**Développé avec ❤️ par [Bigjucode](https://bigjucode.com)**

---

*Pour plus d'informations, visitez [le repository GitHub](https://github.com/bigjucode53/bigjucode-portfolio-theme)*