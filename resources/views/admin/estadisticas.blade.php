<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Estadisticas - Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glow-effect {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        .bounce-animation {
            animation: bounce 2s infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translateY(0); }
            40%, 43% { transform: translateY(-30px); }
            70% { transform: translateY(-15px); }
            90% { transform: translateY(-4px); }
        }
        
        .ios-shadow {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            background-size: 200% 100%;
            animation: gradient-shift 3s ease-in-out infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">
    @include('admin.layouts.nav')
    
    <main class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500 rounded-full opacity-20 floating-animation"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-purple-500 rounded-full opacity-20 floating-animation" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-40 left-20 w-20 h-20 bg-pink-500 rounded-full opacity-20 floating-animation" style="animation-delay: -4s;"></div>
            <div class="absolute bottom-20 right-10 w-28 h-28 bg-indigo-500 rounded-full opacity-20 floating-animation" style="animation-delay: -1s;"></div>
        </div>
        
        <!-- Main content container -->
        <div class="text-center z-10 px-6 max-w-2xl mx-auto">
            <!-- Icon container -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-32 h-32 glass-effect rounded-3xl ios-shadow glow-effect bounce-animation">
                    <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Title -->
            <h1 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                En Construcción
            </h1>
            
            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-gray-300 mb-8 font-light">
                Estamos trabajando en algo increíble
            </p>
            
            <!-- Description -->
            <p class="text-gray-400 mb-12 max-w-md mx-auto leading-relaxed">
                Nuestro equipo está dando los toques finales a una experiencia completamente nueva. Volveremos pronto con algo asombroso.
            </p>
        </div>
    </main>
    
    @include('admin.layouts.footer')
</body>
</html>