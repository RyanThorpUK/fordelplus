class List {

    constructor() {
        this.addEvents();
        this.setupInitialState();

        this.state = 'close';
    }

    setupInitialState() {
        const menu = document.querySelector('.js--list-menu');
        if (menu) {
            menu.classList.add('transform', 'opacity-0', 'scale-95');
        }
    }

    addEvents() {
        if (document.querySelector('.js--list-toggle')) {
            document.querySelector('.js--list-toggle').addEventListener('click', (e) => {
                this.toggleMenu(this.state !== 'open' ? 'open' : 'close');
            });
        } else {
            this.toggleMenu('close');
        }
    }

    toggleMenu(state) {
        const menu = document.querySelector('.js--list-menu');
        this.state = state;

        if ( this.state === 'open' ) {
            // Entering
            menu.classList.remove('hidden');
            // Force a reflow
            menu.offsetHeight;
            menu.classList.add('transition', 'ease-out', 'duration-100');
            menu.classList.add('transform', 'opacity-100', 'scale-100');
            menu.classList.remove('opacity-0', 'scale-95');
        } else {
            // Leaving
            menu.classList.add('transition', 'ease-in', 'duration-75');
            menu.classList.add('transform', 'opacity-0', 'scale-95');
            menu.classList.remove('opacity-100', 'scale-100');
            
            // Hide after transition
            setTimeout(() => {
                menu.classList.add('hidden');
            }, 75);
        }
    }
}

export default List;

