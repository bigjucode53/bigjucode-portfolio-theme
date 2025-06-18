/**
 * BIGJUCODE - Header JavaScript minimal
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Bigjucode Header loaded!');

    // ==============================================
    // SCROLL EFFECTS
    // ==============================================

    const header = document.querySelector('.wp-block-group');
    let lastScrollTop = 0;

    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (header) {
            // Ajouter box-shadow au scroll
            if (scrollTop > 50) {
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
                header.style.backdropFilter = 'blur(20px)';
            } else {
                header.style.boxShadow = 'none';
                header.style.backdropFilter = 'none';
            }
        }
        
        // Animation logo
        const logoIcon = document.querySelector('.logo-icon');
        if (logoIcon && scrollTop > 0) {
            const rotation = Math.min(scrollTop * 0.02, 360);
            logoIcon.style.transform = `rotate(${rotation}deg)`;
        }
        
        lastScrollTop = scrollTop;
    }

    // Throttle scroll
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (!scrollTimeout) {
            scrollTimeout = setTimeout(function() {
                handleScroll();
                scrollTimeout = null;
            }, 16);
        }
    });

    // ==============================================
    // HOVER EFFECTS (DESKTOP ONLY)
    // ==============================================

    if (window.innerWidth > 768) {
        // Logo hover
        const logoSection = document.querySelector('.logo-section');
        if (logoSection) {
            logoSection.addEventListener('mouseenter', function() {
                const logoIcon = this.querySelector('.logo-icon');
                if (logoIcon) {
                    logoIcon.style.transform = 'rotate(5deg) scale(1.05)';
                }
            });
            
            logoSection.addEventListener('mouseleave', function() {
                const logoIcon = this.querySelector('.logo-icon');
                if (logoIcon) {
                    logoIcon.style.transform = 'rotate(0deg) scale(1)';
                }
            });
        }
    }

    console.log('✅ Header initialized!');
});