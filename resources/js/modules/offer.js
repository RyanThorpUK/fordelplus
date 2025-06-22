import CopyToClipboard from '../untils/copyToClipboard';
import delegate from '../untils/delegate';

class Offer {

    constructor() {
        this.addEvents();
    }

    addEvents() {
        delegate(document, 'click', '.js--offer-reveal', (e) => {
            e.currentTarget.classList.add('hidden');
            document.querySelector('.js--offer-code').classList.remove('hidden');
        });

        delegate(document, 'click', '.js--offer-code-btn', (e) => {
            let value = e.currentTarget.querySelector('.js--offer-code-value').innerText;
            new CopyToClipboard(value);

            let notification = e.currentTarget.querySelector('.js--offer-code-copied');
            notification.classList.remove('hidden', 'opacity-1');
            setTimeout(() => {
                notification.classList.add('opacity-1');
            }, 1000);
        });
    }
}

export default Offer;

