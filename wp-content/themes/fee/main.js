document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // 2. Scroll Handling (Header & Bottom CTA)
    const header = document.querySelector('header');
    const bottomCta = document.getElementById('bottom-cta');
    const contactButton = document.getElementById('header-contact-btn');
    const scrollTop = document.getElementById('scroll-top');

    const handleScroll = () => {
        if (window.scrollY > 50) {
            // Header Active State
            header.classList.remove('bg-transparent', 'py-4');
            header.classList.add('bg-white/80', 'backdrop-blur-md', 'shadow-sm', 'py-2');
            
            if (contactButton) {
                contactButton.classList.remove('bg-white/80', 'text-text-main');
                contactButton.classList.add('bg-rose-gold', 'text-white');
            }

            // Show Bottom CTA (Mobile)
            if (bottomCta) {
                bottomCta.classList.remove('translate-y-full');
                bottomCta.classList.add('translate-y-0');
            }
        } else {
            // Header Transparent State
            header.classList.add('bg-transparent', 'py-4');
            header.classList.remove('bg-white/80', 'backdrop-blur-md', 'shadow-sm', 'py-2');

            if (contactButton) {
                contactButton.classList.add('bg-white/80', 'text-text-main');
                contactButton.classList.remove('bg-rose-gold', 'text-white');
            }

            // Hide Bottom CTA
            if (bottomCta) {
                bottomCta.classList.add('translate-y-full');
                bottomCta.classList.remove('translate-y-0');
            }
        }
    };

    window.addEventListener('scroll', handleScroll);

    // 3. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

    const openMobileMenu = () => {
        mobileMenu.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
        lucide.createIcons();
    };

    const closeMobileMenu = () => {
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = '';
        lucide.createIcons();
    };

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileMenu);
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }

    // Close menu when clicking on menu links
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            if (!targetId) return;

            closeMobileMenu();

            // Wait for menu to close before scrolling
            setTimeout(() => {
                if (targetId === 'top') {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return;
                }

                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }, 300);
        });
    });

    // 4. Smooth Scroll (Desktop)
    document.querySelectorAll('a[href^="#"]:not(.mobile-menu-link)').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            if (!targetId) return;

            if (targetId === 'top') {
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return;
            }

            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // 5. FAQ Accordion
    const faqButtons = document.querySelectorAll('.faq-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.faq-icon');
            const isOpened = !content.classList.contains('max-h-0');

            // Toggle current
            if (isOpened) {
                content.classList.add('max-h-0', 'opacity-0');
                content.classList.remove('max-h-48', 'opacity-100');
                // Change icon to Plus (handled by lucide re-render or class toggle if using pure CSS)
                // For simplicity, we toggle lucide attributes and re-render
                icon.setAttribute('data-lucide', 'plus');
            } else {
                // Close others (Optional: nice to have)
                faqButtons.forEach(otherBtn => {
                    if (otherBtn !== button) {
                        const otherContent = otherBtn.nextElementSibling;
                        const otherIcon = otherBtn.querySelector('.faq-icon');
                        otherContent.classList.add('max-h-0', 'opacity-0');
                        otherContent.classList.remove('max-h-48', 'opacity-100');
                        otherIcon.setAttribute('data-lucide', 'plus');
                    }
                });

                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-48', 'opacity-100');
                icon.setAttribute('data-lucide', 'minus');
            }
            lucide.createIcons();
        });
    });

    // 6. Particles Generation
    const particleContainer = document.getElementById('particles-container');
    if (particleContainer) {
        // Floating particles
        for (let i = 0; i < 30; i++) {
            const p = document.createElement('div');
            p.className = 'absolute rounded-full bg-rose-gold/30 blur-[1px] animate-twinkle';
            p.style.left = `${Math.random() * 100}%`;
            p.style.top = `${Math.random() * 100}%`;
            const size = Math.random() * 6 + 2;
            p.style.width = `${size}px`;
            p.style.height = `${size}px`;
            p.style.animationDelay = `${Math.random() * 5}s`;
            p.style.animationDuration = `${Math.random() * 4 + 3}s`;
            particleContainer.appendChild(p);
        }
        
        // Background Blobs
        const bg1 = document.createElement('div');
        bg1.className = 'absolute top-0 right-0 w-96 h-96 bg-champagne-pink/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2';
        particleContainer.appendChild(bg1);

        const bg2 = document.createElement('div');
        bg2.className = 'absolute bottom-0 left-0 w-80 h-80 bg-dusty-rose/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3';
        particleContainer.appendChild(bg2);
    }
});
