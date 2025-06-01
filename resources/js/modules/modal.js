 class Modal {

    constructor() {
        this.addEvents();
    };

    addEvents() {
        let timeoutId = null;
        let hasRan = false;

        let observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {

                if (timeoutId) {
                    // If a previous timeout is still pending, clear it.
                    clearTimeout(timeoutId);
                }

                if (hasRan) {
                    return;
                }

                    let event = new CustomEvent("modal-ui-change", {
                        detail: {
                            isVisible: mutation.target.checkVisibility()
                        }
                    });

                    if (event.detail.isVisible) {
                        document.dispatchEvent(new CustomEvent("init-wysiwyg"));
                    }


                    // Reset timeoutId after the execution is complete.
            });
        });

        let modal = document.querySelector('.js--ui-modal-el');
        observer.observe(modal, {
            attributes: true, // attribute changes
        });
    }
}

export default Modal;
