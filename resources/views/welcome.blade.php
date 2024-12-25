@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gradient-to-r from-purple-900 via-purple-600 to-pink-600 relative overflow-hidden">
    <!-- Top Contact Bar -->
    <div class="bg-black/20 text-white py-2">
        <div class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center text-sm">
            <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 mb-2 sm:mb-0">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    <span>07061600546</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>info@luminaevents.com</span>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="https://facebook.com/LuminaEvents" class="hover:text-pink-300 transition transform hover:scale-110">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                    </svg>
                </a>
                <a href="https://instagram.com/Lumina_event_" class="hover:text-pink-300 transition transform hover:scale-110">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2a10 10 0 0 0-3.16 19.5c-.07-.7-.13-1.75.03-2.5.15-.66.98-4.21.98-4.21s-.25-.5-.25-1.23c0-1.15.67-2 1.5-2 .71 0 1.05.53 1.05 1.17 0 .71-.45 1.77-.69 2.75-.2.82.41 1.5 1.22 1.5 1.47 0 2.47-1.55 2.47-3.77 0-1.97-1.41-3.35-3.42-3.35-2.33 0-3.69 1.74-3.69 3.54 0 .7.27 1.45.6 1.86.07.08.08.15.06.23l-.23.94c-.04.14-.13.17-.28.1-1.05-.48-1.7-2-1.7-3.22 0-2.6 1.88-4.98 5.42-4.98 2.85 0 5.06 2.03 5.06 4.75 0 2.83-1.78 5.11-4.26 5.11-.83 0-1.61-.43-1.88-.94l-.51 1.93c-.18.71-.68 1.61-1.01 2.15A10 10 0 1 0 12 2z"/>
                    </svg>
                </a>
                <a href="https://wa.me/2347061600546" class="hover:text-pink-300 transition transform hover:scale-110">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 min-h-[calc(100vh-40px)] py-12 flex items-center relative">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -right-20 -top-20 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
            <!-- Left Content -->
            <div class="text-white space-y-8">
                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl font-light tracking-wider">LUMINA EVENTS PRESENTS</h2>
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold bg-gradient-to-r from-white to-pink-200 bg-clip-text text-transparent font-sans">2024 End of the Year Carnival & Trade Fair</h1>
                    <p class="text-xl sm:text-2xl font-light">1st Edition | December 29th, 2024</p>
                </div>

                <div class="flex flex-wrap gap-4">

                    <livewire:book-ticket />
                    <div class="flex items-center gap-4 text-lg">
                        <span class="font-light">Starting from</span>
                        <span class="font-bold text-2xl">₦1,000</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <p class="font-semibold">Event Location:</p>
                    <p class="text-lg sm:text-xl">Centenary Park, Opp. Govt. House, Kaduna</p>
                </div>

                <div class="bg-white/5 backdrop-blur-sm p-4 rounded-xl text-center">
                    <h3 class="text-lg font-semibold mb-4">Side Attractions</h3>
                    <p class="text-sm">
                        Buying & Selling • Music Performance • Face Painting • Games • Dancing Competition • Networking • Red Carpet • Comedy • Give Away • Award Presentation & Lots More...
                    </p>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-pink-300 transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.223-.548.223l.188-2.85 5.18-4.68c.223-.198-.054-.314-.346-.116l-6.406 4.02-2.773-.916c-.604-.188-.612-.608.126-.902l10.833-4.174c.5-.188.943.112.786.913z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-pink-300 transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-pink-300 transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Content -->
            <div class="space-y-8">
                <img src="{{ asset('images/carnival.jpg') }}" alt="Event Banner" class="w-full max-w-md mx-auto rounded-2xl  transform -rotate-2 hover:rotate-0 transition duration-500">

                <!-- Partners & Sponsors -->
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 sm:p-6">
                    <h3 class="text-white text-lg sm:text-xl font-semibold mb-4">Official Partners & Sponsors</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <img src="{{ asset('images/sponsor1.png') }}" alt="Sponsor 1" class="h-8 sm:h-12 object-contain filter brightness-0 invert">
                        <img src="{{ asset('images/bayscopeLogo.png') }}" alt="Sponsor 2" class="h-8 sm:h-12 object-contain filter brightness-0 invert">
                        <img src="{{ asset('images/sponsor3.png') }}" alt="Sponsor 3" class="h-8 sm:h-12 object-contain filter brightness-0 invert">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Celebration Effects -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <!-- Fireworks -->
        <div class="absolute animate-ping" style="left: 20%; top: 30%;">
            <div class="w-8 h-8 bg-yellow-400 rounded-full transform scale-150 opacity-0 animate-firework1"></div>
        </div>
        <div class="absolute animate-ping" style="left: 60%; top: 20%;">
            <div class="w-8 h-8 bg-pink-500 rounded-full transform scale-150 opacity-0 animate-firework2"></div>
        </div>
        <div class="absolute animate-ping" style="left: 80%; top: 40%;">
            <div class="w-8 h-8 bg-blue-400 rounded-full transform scale-150 opacity-0 animate-firework3"></div>
        </div>
        <div class="absolute animate-ping" style="left: 40%; top: 50%;">
            <div class="w-8 h-8 bg-purple-400 rounded-full transform scale-150 opacity-0 animate-firework1"></div>
        </div>
        <div class="absolute animate-ping" style="left: 30%; top: 25%;">
            <div class="w-8 h-8 bg-green-400 rounded-full transform scale-150 opacity-0 animate-firework2"></div>
        </div>
        <div class="absolute animate-ping" style="left: 70%; top: 35%;">
            <div class="w-8 h-8 bg-red-400 rounded-full transform scale-150 opacity-0 animate-firework3"></div>
        </div>

        <!-- Confetti -->
        <div class="absolute animate-confetti" style="left: 10%; top: -20px;">
            <div class="w-2 h-2 bg-red-500 rotate-45"></div>
        </div>
        <div class="absolute animate-confetti" style="left: 50%; top: -20px;">
            <div class="w-2 h-2 bg-green-500 rotate-12"></div>
        </div>
        <div class="absolute animate-confetti" style="left: 90%; top: -20px;">
            <div class="w-2 h-2 bg-purple-500 -rotate-45"></div>
        </div>
    </div>

    <style>
        @keyframes firework1 {
            0% { transform: scale(0); opacity: 1; }
            50% { transform: scale(2.5); opacity: 0.5; }
            100% { transform: scale(5); opacity: 0; }
        }
        @keyframes firework2 {
            0% { transform: scale(0); opacity: 1; }
            60% { transform: scale(3); opacity: 0.5; }
            100% { transform: scale(6); opacity: 0; }
        }
        @keyframes firework3 {
            0% { transform: scale(0); opacity: 1; }
            70% { transform: scale(3.5); opacity: 0.5; }
            100% { transform: scale(7); opacity: 0; }
        }
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }
        .animate-firework1 {
            animation: firework1 2s ease-out infinite;
        }
        .animate-firework2 {
            animation: firework2 2.5s ease-out infinite;
        }
        .animate-firework3 {
            animation: firework3 3s ease-out infinite;
        }
        .animate-confetti {
            animation: confetti 5s linear infinite;
        }
    </style>

</div>
@endsection

