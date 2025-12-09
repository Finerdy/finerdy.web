// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking on a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Waitlist form AJAX submission
    const form = document.getElementById('waitlist-form');
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const button = document.getElementById('waitlist-button');
            const buttonText = document.getElementById('button-text');
            const buttonLoading = document.getElementById('button-loading');
            const emailInput = document.getElementById('waitlist-email');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const privacyNote = document.getElementById('privacy-note');

            // Show loading state
            button.disabled = true;
            buttonText.classList.add('hidden');
            buttonLoading.classList.remove('hidden');
            errorMessage.classList.add('hidden');

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    // Success
                    successMessage.classList.remove('hidden');
                    privacyNote.classList.add('hidden');
                    emailInput.value = '';
                    emailInput.disabled = true;
                    button.classList.add('hidden');
                } else {
                    // Error from server
                    throw new Error('Server error');
                }
            } catch (error) {
                // Show error message
                errorMessage.classList.remove('hidden');
                button.disabled = false;
            }

            // Reset button state
            buttonText.classList.remove('hidden');
            buttonLoading.classList.add('hidden');
        });
    }
});
