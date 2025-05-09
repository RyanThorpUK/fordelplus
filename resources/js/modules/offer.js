import CopyToClipboard from '../untils/copyToClipboard';

class Offer {

    constructor() {
        this.addEvents();
    }

    addEvents() {

        if ( document.querySelector('.js--offer-reveal') ) {
            document.querySelector('.js--offer-reveal').addEventListener('click', (e) => {
                e.currentTarget.classList.add('hidden');
                document.querySelector('.js--offer-code').classList.remove('hidden');
            });
        }

        if ( document.querySelector('.js--offer-code') ) {
            document.querySelector('.js--offer-code-btn').addEventListener('click', (e) => {
                let value = e.currentTarget.querySelector('.js--offer-code-value').innerText;
                new CopyToClipboard(value);
            });
        }
    }
}

export default Offer;

