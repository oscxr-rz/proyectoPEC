<!-- Footer estilizado -->
<footer class="bg-gradient-to-r from-slate-900 via-gray-900 to-slate-900 border-t border-gray-800 mt-auto">
    <!-- Bottom Footer -->
    <div class="border-t border-gray-800 bg-black/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="text-center md:text-left">
                    <p class="text-gray-400 text-sm">
                        &copy; 2025 Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button - Flotante con z-index máximo -->
    <button id="back-to-top"
            class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-teal-600 to-teal-800 hover:from-teal-700 hover:to-teal-900 text-white rounded-full shadow-2xl transition-all duration-300 transform hover:scale-110 opacity-0 invisible"
            style="z-index: 9999 !important;"
            onclick="scrollToTop()">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</footer>

<script>
    // Back to top functionality
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Show/hide back to top button with enhanced visibility
    window.addEventListener('scroll', function() {
        const backToTopButton = document.getElementById('back-to-top');
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
            // Asegurar que siempre esté encima
            backToTopButton.style.zIndex = '9999';
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible');
            backToTopButton.classList.remove('opacity-100', 'visible');
        }
    });

    // Asegurar que el botón siempre esté encima al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopButton = document.getElementById('back-to-top');
        backToTopButton.style.zIndex = '9999';
        backToTopButton.style.position = 'fixed';
    });
</script>