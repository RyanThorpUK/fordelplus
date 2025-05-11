class Navigation {

     constructor() {
        this.mobileMenuButton = document.querySelector('.js--toggle-mobile-menu');
        this.mobileMenu = document.querySelector('[data-mobile-menu]');
        this.overlay = document.querySelector('[data-mobile-overlay]');

        this.addEvents();
    }

    addEvents() {
        if (this.mobileMenuButton) {
            this.mobileMenuButton.addEventListener('click', () => {
                this.toggleMenu()
            });
        }

        if (this.overlay) {
            this.overlay.addEventListener('click', () => {
                this.toggleMenu()
            });
        }
    }

    toggleMenu() {
        console.log(this.mobileMenu);
        this.mobileMenu.classList.toggle('translate-x-0');
        this.mobileMenu.classList.toggle('-translate-x-full');
        this.overlay.classList.toggle('hidden');
    }

    // // Close menu when clicking a link
    // const mobileLinks = mobileMenu?.querySelectorAll('a');
    // mobileLinks?.forEach(link => {
    //     link.addEventListener('click', () => {
    //         if (window.innerWidth < 1024) { // lg breakpoint
    //             toggleMenu();
    //         }
    //     });
    // });
}

export default Navigation;