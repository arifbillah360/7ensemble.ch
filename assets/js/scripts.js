/**
 * 7 Ensemble JavaScript
 * Handles modal interactions and AJAX form submission
 */

(function($) {
    'use strict';

    /**
     * Show Seven Person Modal
     */
    window.showSevenModal = function() {
        $('#registrationModal').addClass('show');
        // Pre-select 7-person option
        $('input[name="optionType"][value="seven"]').prop('checked', true);
    };

    /**
     * Show Three Person Modal
     */
    window.showThreeModal = function() {
        $('#registrationModal').addClass('show');
        // Pre-select 3-person option
        $('input[name="optionType"][value="three"]').prop('checked', true);
    };

    /**
     * Close Modal
     */
    window.closeModal = function(modalId) {
        $('#' + modalId).removeClass('show');
    };

    /**
     * Close modal when clicking outside
     */
    $(window).on('click', function(event) {
        if ($(event.target).hasClass('modal')) {
            $(event.target).removeClass('show');
        }
    });

    /**
     * Handle Form Submission via AJAX
     */
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();

        // Get selected option type
        const optionType = $('input[name="optionType"]:checked').val();

        if (!optionType) {
            alert('⚠️ Veuillez sélectionner une option (3 ou 7 personnes)');
            return;
        }

        const targetAmount = optionType === 'seven' ? '1,575,747€' : '7,789€';

        // Collect form data
        const formData = {
            action: 'sept_register',
            nonce: septEnsemble.nonce,
            fullName: $('#fullName').val(),
            email: $('#email').val(),
            country: $('#country').val(),
            paymentMethod: $('#paymentMethod').val(),
            optionType: optionType
        };

        // Get submit button
        const $submitBtn = $(this).find('button[type="submit"]');
        const originalText = $submitBtn.html();

        // Disable button and show loading state
        $submitBtn.html('⏳ Création de votre constellation...').prop('disabled', true);

        // Send AJAX request
        $.ajax({
            url: septEnsemble.ajax_url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const message = optionType === 'seven' ?
                        `🎉 FÉLICITATIONS ! Bienvenue dans 7 Ensemble (7 Personnes) !\n\n✅ Objectif : ${targetAmount}\n✅ Votre inscription est confirmée\n✅ Email de bienvenue envoyé\n✅ Votre constellation de 7 personnes sera formée sous 24-48h\n✅ Premiers gains dans 7 jours maximum\n\n🚀 Votre voyage vers la liberté financière commence MAINTENANT !` :
                        `✨ FÉLICITATIONS ! Bienvenue dans 7 Ensemble (3 Personnes) !\n\n✅ Objectif : ${targetAmount}\n✅ Votre inscription est confirmée\n✅ Email de bienvenue envoyé\n✅ Votre constellation de 3 personnes sera formée sous 24-48h\n✅ Premiers gains dans 5 jours maximum\n\n🌟 Parfait pour découvrir le système avant de passer aux 7 personnes !`;

                    alert(message);

                    // Close modal and reset form
                    closeModal('registrationModal');
                    $('#registrationForm')[0].reset();
                } else {
                    alert('❌ Erreur: ' + (response.data.message || 'Une erreur est survenue. Veuillez réessayer.'));
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('❌ Erreur de connexion. Veuillez vérifier votre connexion internet et réessayer.');
            },
            complete: function() {
                // Re-enable button and restore original text
                $submitBtn.html(originalText).prop('disabled', false);
            }
        });
    });

    /**
     * Animation on Scroll
     */
    function animateOnScroll() {
        const elements = $('.principe-card, .tour-item, .stat-item');
        elements.each(function(index) {
            const elementTop = $(this)[0].getBoundingClientRect().top;
            if (elementTop < window.innerHeight * 0.8) {
                $(this).css('animation', `fadeInUp 0.6s ease-out ${index * 0.1}s both`);
            }
        });
    }

    // Run animation on scroll
    $(window).on('scroll', animateOnScroll);

    // Initial animation
    setTimeout(animateOnScroll, 500);

    /**
     * Animate Numbers on Scroll
     */
    function animateNumbers() {
        const numbers = $('.stat-number, .tour-amount');
        numbers.each(function() {
            const $num = $(this);
            const rect = $num[0].getBoundingClientRect();

            if (rect.top < window.innerHeight && !$num.hasClass('animated')) {
                $num.addClass('animated');
                const finalValue = $num.text();
                $num.text('0');

                let current = 0;
                const target = parseInt(finalValue.replace(/[^\d]/g, ''));
                const increment = target / 50;

                const timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        $num.text(finalValue);
                        clearInterval(timer);
                    } else {
                        const displayValue = Math.floor(current) + (finalValue.includes('€') ? '€' : '');
                        $num.text(displayValue);
                    }
                }, 50);
            }
        });
    }

    // Run number animation on scroll
    $(window).on('scroll', animateNumbers);

})(jQuery);
