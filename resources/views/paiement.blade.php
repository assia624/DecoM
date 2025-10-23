<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement - DecoM</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; margin: 0; }
    .font-display { font-family: 'Cormorant Garamond', serif; }
    .hero-bg {
        background: url('{{ asset("storage/images/background2.jpg") }}') center/cover no-repeat;
        position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center;
    }
    .overlay {
        position: absolute; inset: 0;
        background: rgba(26, 26, 26, 0.5);
        backdrop-filter: blur(5px);
    }
    .card-glass {
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 2rem;
        padding: 3rem;
        max-width: 400px;
        width: 100%;
        text-align: center;
        color: #fff;
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        animation: fadeInUp 1s ease forwards;
        transform: translateY(20px);
        opacity: 0;
    }
    @keyframes fadeInUp {
        to { opacity: 1; transform: translateY(0); }
    }
    .btn-primary {
        background: linear-gradient(135deg, #C89B6D, #FFDCA0);
        color: #1A1A1A;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 9999px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(200,155,109,0.5);
    }
</style>
</head>
    <nav class="nav-glass fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-[#1A1A1A] rounded-full flex items-center justify-center transition-transform group-hover:rotate-180 duration-500">
                        <span class="text-[#FAFAF8] font-display text-xl font-semibold">D</span>
                    </div>
                    <span class="font-display text-2xl font-semibold text-[#1A1A1A] tracking-tight">DecoM</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href

 class="text-sm font-medium text-[#7e7971] hover:text-[#D4A574] transition-colors duration-300">Accueil</a>
                    <a href="/about" class="text-sm font-medium text-[#7e7971] hover:text-[#1A1A1A] transition-colors duration-300">À propos</a>
                    <a href="/contact" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">Contact</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-6">
                    @guest
                        <a href="/login" class="hidden md:inline-block text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">Connexion</a>
                        <a href="/register" class="px-6 py-2.5 bg-[#1A1A1A] text-[#FAFAF8] text-sm font-medium rounded-full hover:bg-[#2A2A2A] transition-all duration-300">S'inscrire</a>
                    @else
                        <a href="{{ route('panier') }}"  class="relative group">
                            <svg class="w-6 h-6 text-[#7e7971] group-hover:text-[#D4A574] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </a>
                        <a href="/profile" class="w-9 h-9 bg-[#1A1A1A] rounded-full flex items-center justify-center hover:bg-[#2A2A2A] transition-colors duration-300">
                            <span class="text-[#FAFAF8] text-sm font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

<body class="flex flex-col min-h-screen">

<!-- Hero / Background -->
<section class="hero-bg flex-1 relative">
    <div class="overlay"></div>

    <div class="card-glass z-10">
        <h1 class="text-3xl font-display font-semibold mb-4">💳 Paiement sécurisé</h1>
        <p class="mb-2">Commande n° <strong>{{ $commande->id }}</strong></p>
        <p class="text-2xl font-semibold mb-6">{{ $commande->total }} MAD</p>

        <form method="POST" action="{{ route('paiement.valider', $commande->id) }}">
            @csrf
            <button type="submit" class="btn-primary">Valider le paiement</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#1A1A1A] text-white py-8 text-center">
    <p>&copy; {{ date('Y') }} DecoM. Tous droits réservés.</p>
    <p class="text-sm text-white/70">Design by Assia ✨</p>
</footer>

</body>
</html>
