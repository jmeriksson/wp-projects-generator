// Add scripts here

window.addEventListener('DOMContentLoaded', function() {

    var navToggle = document.querySelector('#js-project-nav-toggle');
    var navMenu = document.querySelector('#js-project-nav-menu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', event => {
            event.preventDefault();
            navToggle.classList.toggle('collapsed');
            navMenu.classList.toggle('collapsed');
        })
    }
    
}, false);
