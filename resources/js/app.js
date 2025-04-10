import './bootstrap';

// Add an event listener to handle dark mode toggle
document.addEventListener('DOMContentLoaded', function() {
    // Theme initialization is handled directly in the HTML to prevent flashing

    // Initialize mobile menu
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('sidebar');
    
    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!sidebar.contains(event.target) && 
                !mobileMenuButton.contains(event.target) && 
                !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    }

    // Handle alert dismissals
    const dismissButtons = document.querySelectorAll('[data-dismiss="alert"]');
    dismissButtons.forEach(button => {
        button.addEventListener('click', () => {
            const alert = button.closest('.alert');
            if (alert) {
                alert.remove();
            }
        });
    });
});
