class OfferSelector {

    constructor() {
        this.addEvents();
    }

    addEvents() {
        this.parent = document.querySelectorAll('.js--offer-selector-parent-button');
        this.offers = document.querySelectorAll('.js--offer');

        this.parent.forEach(button => {
            button.addEventListener('click', (e) => {

                this.selectParent(e);
            });
        });

        this.child = document.querySelectorAll('.js--offer-selector-child-button');
        this.child.forEach(button => {
            button.addEventListener('click', (e) => {

                this.selectChild(e);
                this.filterOffers(e.currentTarget.dataset.id);
            });
        });
    }

    selectParent(e) {
       
        document.querySelectorAll('.js--offer-selector-child').forEach(child => {
            child.classList.add('hidden');
        });
    
        document.querySelector('.js--offer-selector-child[data-id="' + e.currentTarget.dataset.id + '"]').classList.remove('hidden');

        this.parent.forEach(button => {
            button.classList.remove('border-primary');
            button.classList.add('border-transparent');
        });

        e.currentTarget.classList.add('border-primary');
        e.currentTarget.classList.remove('border-transparent');
    }

    selectChild(e) {
        this.child.forEach(child => {
            child.classList.remove('border-primary');
            child.classList.add('border-transparent');
        });
        e.currentTarget.classList.add('border-primary');
        e.currentTarget.classList.remove('border-transparent');
    }

    filterOffers(categoryId) {

        this.offers.forEach(offer => {
            // console.log(offer.dataset.category, categoryId);
            if (offer.dataset.category === categoryId) {
                offer.classList.remove('hidden');
            } else {
                offer.classList.add('hidden');
            }
        });
    }
}

export default OfferSelector;

