class UserTypeSelector {

    constructor() {
       this.$el = document.querySelector('.js--toggle-user-type-selector');
       this.$menu = document.querySelector('.js--user-type-selector-menu');

       this.addEvents();
   }

   addEvents() {
       if (this.$el) {

           document.querySelector('body').addEventListener('click', (e) => {
            console.log(e.target);
               if (e.target.closest('.js--toggle-user-type-selector')) {
                   this.toggleMenu()
               } else {
                    this.$menu.classList.add('hidden');
               }
           });
       }
   }

   toggleMenu() {
       this.$menu.classList.toggle('hidden');
   }
}

export default UserTypeSelector;