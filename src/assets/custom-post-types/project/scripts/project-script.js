// Runs scripts after DOM has loaded.
window.addEventListener('DOMContentLoaded', function() {

    // Toogle for mobile navigation
    var navToggle = document.querySelector('#js-project-nav-toggle');

    // Mobile navigation
    var navMenu = document.querySelector('#js-project-nav-menu');

    if (navToggle && navMenu) {
        // Toggle navigation on click
        navToggle.addEventListener('click', event => {
            event.preventDefault();
            navToggle.classList.toggle('collapsed');
            navMenu.classList.toggle('collapsed');
        })
    }
    
}, false);
