import Quill from 'quill';

class Wysiwyg {

    constructor() {
        document.addEventListener('init-wysiwyg', e => {
            this.initQuill();
        });
    }

    initQuill() {

        document.querySelectorAll('.js--wysiwyg').forEach(element => {
            console.log(element);

            if ( element.classList.contains('ql-container') ) {
                return;
            }

            let quill = new Quill(element, {
                theme: 'snow'
            });

            quill.on('text-change', function (delta, oldDelta, source) {
                let model = element.getAttribute('data-model');
                
                if (model) {
                    window.Livewire.dispatch('wysiwyg-updated', {
                        model: model,
                        content: quill.root.innerHTML,
                        delta: delta,
                        oldDelta: oldDelta
                    });
                }
            });
        });
    }
}

export default Wysiwyg;

