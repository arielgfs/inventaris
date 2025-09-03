// Logo Effects for Britech Logo - Simplified Version
document.addEventListener('DOMContentLoaded', function() {
    const logo = document.querySelector('.britech-logo-img');
    
    if (logo) {
        // Add rounded corners effect using CSS
        logo.style.borderRadius = '12px';
        
        // Remove any hover effects that make it look clickable
        logo.style.cursor = 'default';
        
        // Remove any transition effects
        logo.style.transition = 'none';
        
        // Remove any filter effects (glow/shadow)
        logo.style.filter = 'none';
    }
});
