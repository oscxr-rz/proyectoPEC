<nav
    class="bg-white/5 backdrop-blur-3xl rounded-3xl shadow-2xl border border-white/10 p-3 sm:p-6 mb-6 relative overflow-hidden">
    <!-- Efecto de brillo sutil -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -skew-x-12 -translate-x-full animate-pulse">
    </div>

    <!-- Scroll horizontal en móviles -->
    <div class="overflow-x-auto scrollbar-hide">
        <ul
            class="flex justify-center lg:justify-start items-center gap-2 sm:gap-3 relative z-10 min-w-max sm:min-w-0 sm:flex-wrap">
            <li class="flex-shrink-0">
                <a href="{{ route('admin.inicio') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Inicio</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.inventario') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Inventario</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.inventario') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Categorías</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.paquetes') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Paquetes</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.donaciones') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Donaciones</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.estadisticas') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Estadísticas</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.ventas') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Ventas</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.proyectos') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Proyectos</span>
                </a>
            </li>

            <li class="flex-shrink-0">
                <a href="{{ route('admin.testimonios') }}"
                    class="group flex items-center gap-2 sm:gap-3 px-3 sm:px-5 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-white/8 hover:bg-white/15 text-white/90 hover:text-white transition-all duration-500 hover:scale-105 hover:shadow-lg hover:shadow-white/10 border border-white/10 hover:border-white/20 backdrop-blur-sm">
                    <div class="p-1 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs sm:text-sm font-medium tracking-wide whitespace-nowrap">Testimonios</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    .scrollbar-hide {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>
