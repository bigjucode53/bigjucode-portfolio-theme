// GSAP Timeline pour le menu mobile
        const tl = gsap.timeline({ paused: true });

        // Configuration de l'animation d'ouverture du menu
        tl.to("#mobileOverlay", {
            duration: 0.4,
            opacity: 1,
            ease: "power2.out"
        })
        .to("#mobileNav", {
            duration: 0.5,
            right: "0%",
            ease: "power3.out"
        }, "-=0.2")
        .to(".nav-mobile-link", {
            duration: 0.4,
            opacity: 1,
            x: 0,
            stagger: 0.1,
            ease: "power2.out"
        }, "-=0.3")
        .to(".nav-mobile-cta", {
            duration: 0.4,
            opacity: 1,
            y: 0,
            ease: "power2.out"
        }, "-=0.2")
        .to(".nav-mobile-social", {
            duration: 0.4,
            opacity: 1,
            y: 0,
            ease: "power2.out"
        }, "-=0.3");

        // Variables
        const burgerMenu = document.getElementById('burgerMenu');
        const mobileNav = document.getElementById('mobileNav');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const header = document.getElementById('header');
        let isMenuOpen = false;

        // Toggle du menu mobile
        function toggleMenu() {
            if (!isMenuOpen) {
                // Ouvrir le menu
                burgerMenu.classList.add('active');
                mobileNav.classList.add('active');
                mobileOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
                tl.play();
                isMenuOpen = true;
            } else {
                // Fermer le menu
                burgerMenu.classList.remove('active');
                mobileNav.classList.remove('active');
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
                tl.reverse();
                isMenuOpen = false;
            }
        }

        // Event listeners
        burgerMenu.addEventListener('click', toggleMenu);
        mobileOverlay.addEventListener('click', toggleMenu);

        // Fermer le menu quand on clique sur un lien
        document.querySelectorAll('.nav-mobile-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Mettre à jour les liens actifs
                document.querySelectorAll('.nav-mobile-link, .nav-link').forEach(l => l.classList.remove('active'));
                e.target.classList.add('active');
                
                // Trouver le lien correspondant dans le menu desktop
                const linkText = e.target.textContent;
                document.querySelectorAll('.nav-link').forEach(l => {
                    if (l.textContent === linkText) {
                        l.classList.add('active');
                    }
                });
                
                // Fermer le menu avec un petit délai
                setTimeout(toggleMenu, 300);
            });
        });

        // Scroll effect pour le header
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Ajouter classe scrolled
            if (scrollTop > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Animation de parallax subtile pour le logo
            gsap.to('.logo-icon', {
                duration: 0.3,
                rotation: scrollTop * 0.05,
                ease: "power1.out"
            });
            
            lastScrollTop = scrollTop;
        });

        // Animation d'entrée des éléments
        gsap.from('.header', {
            duration: 1,
            y: -100,
            opacity: 0,
            ease: "power3.out",
            delay: 0.2
        });

        // Hover effects avec GSAP
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseenter', () => {
                gsap.to(link, {
                    duration: 0.3,
                    y: -2,
                    ease: "power2.out"
                });
            });
            
            link.addEventListener('mouseleave', () => {
                gsap.to(link, {
                    duration: 0.3,
                    y: 0,
                    ease: "power2.out"
                });
            });
        });

        // Animation du bouton CTA
        document.querySelectorAll('.cta-button').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                gsap.to(btn, {
                    duration: 0.3,
                    scale: 1.05,
                    rotationX: 5,
                    ease: "power2.out"
                });
            });
            
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, {
                    duration: 0.3,
                    scale: 1,
                    rotationX: 0,
                    ease: "power2.out"
                });
            });
        });

        // Animation des liens sociaux
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('mouseenter', () => {
                gsap.to(link, {
                    duration: 0.3,
                    rotation: 360,
                    scale: 1.2,
                    ease: "back.out(1.7)"
                });
            });
            
            link.addEventListener('mouseleave', () => {
                gsap.to(link, {
                    duration: 0.3,
                    rotation: 0,
                    scale: 1,
                    ease: "power2.out"
                });
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMenu();
            }
        });

        console.log('🚀 Header GSAP chargé avec succès !');