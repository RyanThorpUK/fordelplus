import delegate from '../untils/delegate';

class Accordion {
    constructor() {
        this.addEvents();
    }

    addEvents() {

        delegate(document, "click", ".js--accordion-item-btn", (event) => {
            this.toggleAccordion(event.target.closest('.js--accordion-item'));
        });

    }

    toggleAccordion(accordionItem) {
        const content = accordionItem.querySelector('.js--accordion-item-content');

        if (!content || !content.classList.contains('js--accordion-item-content')) {
            return;
        }

        const isExpanded = accordionItem.getAttribute('aria-expanded') === 'true';
        
        // Toggle button state
        accordionItem.setAttribute('aria-expanded', !isExpanded);
        
        // Toggle icons
        const plusIcon = accordionItem.querySelector('svg:not(.hidden)');
        const minusIcon = accordionItem.querySelector('svg.hidden');
        if (plusIcon && minusIcon) {
            plusIcon.classList.toggle('hidden');
            minusIcon.classList.toggle('hidden');
        }

        // Toggle content with transition
        if (isExpanded) {
            // Collapsing
            content.style.height = content.scrollHeight + 'px';
            // Force reflow
            content.offsetHeight;
            content.style.height = '0px';
            content.style.transition = 'height 0.2s ease-out';
            
            setTimeout(() => {
                content.classList.add('hidden');
                content.style.height = '';
            }, 200);
        } else {
            // Expanding
            content.classList.remove('hidden');
            content.style.height = '0px';
            // Force reflow
            content.offsetHeight;
            content.style.height = content.scrollHeight + 'px';
            content.style.transition = 'height 0.2s ease-out';
            
            setTimeout(() => {
                content.style.height = '';
            }, 200);
        }
    }
}

export default Accordion;

