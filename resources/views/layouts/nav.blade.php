<nav class="bg-custom-dark backdrop-blur-sm shadow-xl border-b border-custom-medium/30 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto pr-4 sm:pr-6 lg:pr-8">
        <div class="flex justify-between items-center py-2">
            <!-- Logo pegado a la esquina izquierda ocupando toda la altura -->
            <div class="flex items-center h-full pl-0">
                <div
                    class="h-12 w-12 sm:h-16 sm:w-16 md:h-20 md:w-20 lg:h-24 lg:w-24 xl:h-28 xl:w-28 flex items-center justify-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ Storage::url('images/logo.png') }}" alt="Logo"
                            class="w-full h-full object-contain">
                    </a>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">
                <ul class="flex items-center space-x-1">
                    <li>
                        <a href="{{ route('home') }}"
                            class="px-4 py-2 text-gray-200 hover:text-white hover:bg-custom-primary rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('centros') }}"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Centros de acopio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('estadisticas') }}"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Estadísticas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pec') }}"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            PEC
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('acercade') }}"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Acerca De
                        </a>
                    </li>

                    <!-- Dropdown Menu -->
                    <li class="relative dropdown">
                        <button id="dropdown-toggle"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md flex items-center">
                            Más
                            <svg id="dropdown-arrow" class="w-4 h-4 ml-1 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="dropdown-menu"
                            class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('galeria') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors duration-200">
                                    Galería
                                </a>
                                <a href="{{ route('proyectos') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors duration-200">
                                    Proyectos
                                </a>
                                <a href="{{ route('testimonios') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors duration-200">
                                    Testimonios
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('donacion') }}"
                            class="px-4 py-2 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Donar Dispositivo
                        </a>
                    </li>
                </ul>

                <!-- Separator -->
                <div class="w-px h-6 bg-custom-medium/40 mx-4"></div>

                <!-- User Actions -->
                @if (session('id_usuario'))
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('donacion.historial') }}"
                            class="px-4 py-2 text-gray-200 hover:text-white hover:bg-custom-primary rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Historial
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-200 font-medium shadow-md hover:shadow-lg transform hover:scale-105">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-custom-primary hover:bg-custom-medium text-white rounded-lg transition-all duration-200 font-medium shadow-lg transform hover:scale-105 ring-2 ring-custom-medium/30 hover:ring-custom-primary/50">
                        Iniciar Sesión
                    </a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button"
                    class="p-2 rounded-lg text-gray-200 hover:bg-custom-primary/50 hover:text-white transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu"
            class="lg:hidden hidden border-t border-custom-medium/30 py-4 bg-custom-primary/20 backdrop-blur-sm rounded-b-lg">
            <div class="space-y-2">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium mx-2">
                    Inicio
                </a>
                <a href="{{ route('centros') }}"
                    class="block px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium mx-2">
                    Centros de acopio
                </a>
                <a href="{{ route('estadisticas') }}"
                    class="block px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium mx-2">
                    Estadísticas
                </a>
                <a href="{{ route('pec') }}"
                    class="block px-4 py-3 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md mx-2">
                    PEC
                </a>
                <a href="{{ route('acercade') }}"
                    class="block px-4 py-3 text-green-100 hover:text-white hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 rounded-lg transition-all duration-200 font-medium hover:shadow-md mx-2">
                    Acerca De
                </a>

                <!-- Mobile Dropdown Menu -->
                <div class="mobile-dropdown mx-2">
                    <button id="mobile-dropdown-toggle"
                        class="w-full text-left px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium flex items-center justify-between">
                        Más
                        <svg id="mobile-dropdown-arrow" class="w-4 h-4 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="mobile-dropdown-menu" class="hidden ml-4 mt-2 space-y-1">
                        <a href="{{ route('galeria') }}"
                            class="block px-4 py-2 text-gray-300 hover:bg-custom-primary/30 hover:text-white rounded-lg transition-all duration-200">
                            Galería
                        </a>
                        <a href="{{ route('proyectos') }}"
                            class="block px-4 py-2 text-gray-300 hover:bg-custom-primary/30 hover:text-white rounded-lg transition-all duration-200">
                            Proyectos
                        </a>
                        <a href="{{ route('testimonios') }}"
                            class="block px-4 py-2 text-gray-300 hover:bg-custom-primary/30 hover:text-white rounded-lg transition-all duration-200">
                            Testimonios
                        </a>
                    </div>
                </div>

                <a href="{{ route('donacion') }}"
                    class="block px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium mx-2">
                    Donar Dispositivo
                </a>

                <!-- Mobile User Actions -->
                @if (session('id_usuario'))
                    <div class="border-t border-custom-medium/30 pt-4 mt-4 space-y-2">
                        <a href="{{ route('donacion.historial') }}"
                            class="block px-4 py-3 text-gray-200 hover:bg-custom-primary/50 hover:text-white rounded-lg transition-all duration-200 font-medium mx-2">
                            Historial de Donaciones
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="px-4 mx-2">
                            @csrf
                            <button type="submit"
                                class="w-full text-left py-3 px-3 text-red-300 hover:bg-red-600/20 hover:text-red-200 rounded-lg transition-all duration-200 font-medium">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-custom-medium/30 pt-4 mt-4">
                        <a href="{{ route('login') }}"
                            class="block mx-4 px-4 py-3 bg-custom-primary hover:bg-custom-medium text-white text-center rounded-lg font-medium shadow-lg transform hover:scale-105 transition-all duration-200">
                            Iniciar Sesión
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    // Desktop dropdown functionality
    const dropdownToggle = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const dropdownArrow = document.getElementById('dropdown-arrow');
    const dropdown = document.querySelector('.dropdown');

    let dropdownTimeout;

    // Show dropdown on hover
    dropdown.addEventListener('mouseenter', function() {
        clearTimeout(dropdownTimeout);
        dropdownMenu.classList.remove('opacity-0', 'invisible');
        dropdownMenu.classList.add('opacity-100', 'visible');
        dropdownArrow.style.transform = 'rotate(180deg)';
    });

    // Hide dropdown when leaving the entire dropdown area with delay
    dropdown.addEventListener('mouseleave', function() {
        dropdownTimeout = setTimeout(function() {
            dropdownMenu.classList.add('opacity-0', 'invisible');
            dropdownMenu.classList.remove('opacity-100', 'visible');
            dropdownArrow.style.transform = 'rotate(0deg)';
        }, 300); // 300ms delay
    });

    // Mobile dropdown functionality
    const mobileDropdownToggle = document.getElementById('mobile-dropdown-toggle');
    const mobileDropdownMenu = document.getElementById('mobile-dropdown-menu');
    const mobileDropdownArrow = document.getElementById('mobile-dropdown-arrow');

    mobileDropdownToggle.addEventListener('click', function(e) {
        e.preventDefault();
        mobileDropdownMenu.classList.toggle('hidden');
        if (mobileDropdownMenu.classList.contains('hidden')) {
            mobileDropdownArrow.style.transform = 'rotate(0deg)';
        } else {
            mobileDropdownArrow.style.transform = 'rotate(180deg)';
        }
    });

    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuButton = document.getElementById('mobile-menu-button');

        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            // Also close mobile dropdown when mobile menu closes
            mobileDropdownMenu.classList.add('hidden');
            mobileDropdownArrow.style.transform = 'rotate(0deg)';
        }
    });

    // Add smooth scroll effect for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<style>
    /* Custom colors using your specific palette */
    :root {
        --custom-dark: #072e33;
        --custom-primary: #0c7075;
        --custom-medium: #115c5f;
        --custom-light: #d1fae5;
    }

    .bg-custom-dark {
        background-color: var(--custom-dark);
    }

    .bg-custom-primary {
        background-color: var(--custom-primary);
    }

    .bg-custom-medium {
        background-color: var(--custom-medium);
    }

    .hover\\:bg-custom-primary:hover {
        background-color: var(--custom-primary);
    }

    .hover\\:bg-custom-medium:hover {
        background-color: var(--custom-medium);
    }

    .hover\\:bg-custom-primary\\/50:hover {
        background-color: rgba(12, 112, 117, 0.5);
    }

    .hover\\:bg-custom-primary\\/30:hover {
        background-color: rgba(12, 112, 117, 0.3);
    }

    .border-custom-medium\\/30 {
        border-color: rgba(17, 92, 95, 0.3);
    }

    .ring-custom-medium\\/30 {
        --tw-ring-color: rgba(17, 92, 95, 0.3);
    }

    .hover\\:ring-custom-primary\\/50:hover {
        --tw-ring-color: rgba(12, 112, 117, 0.5);
    }

    .bg-custom-primary\\/20 {
        background-color: rgba(12, 112, 117, 0.2);
    }

    /* Subtle animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInDown 0.3s ease-out;
    }

    /* Enhanced hover effects */
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
</style>
