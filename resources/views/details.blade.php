<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $articleD->title }} - DecoM</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-[#FAFAF8]">

<!-- Navbar -->
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
                    <a href = "/" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574] transition-colors duration-300">Accueil</a>
                    <a href="/about" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">À propos</a>
                    <a href="/contact" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">Contact</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-6">
                    @guest
                        <a href="/login" class="hidden md:inline-block text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">Connexion</a>
                        <a href="/register" class="px-6 py-2.5 bg-[#1A1A1A] text-[#FAFAF8] text-sm font-medium rounded-full hover:bg-[#2A2A2A] transition-all duration-300">S'inscrire</a>
                    @else
                        <a href="{{ route('panier') }}"  class="relative group">
                            <svg class="w-6 h-6 text-[#1A1A1A] group-hover:text-[#D4A574] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    </nav>v>
</nav>

<main class="pt-32 max-w-6xl mx-auto px-6">
    <div class="flex flex-col md:flex-row gap-12">
        <!-- Image -->
        <div class="flex-1 rounded-3xl overflow-hidden shadow-lg">
            @if($articleD->image)
                <img src="{{ asset('storage/' . $articleD->image) }}" alt="{{ $articleD->title }}" class="w-full h-full object-cover">
            @endif
        </div>

        <!-- Details -->
        <div class="flex-1 flex flex-col gap-6">
            <h1 class="font-display text-4xl font-semibold text-[#1A1A1A]">{{ $articleD->title }}</h1>
            <p class="text-[#6B6B6B] text-lg leading-relaxed">{{ $articleD->content }}</p>
            <p class="text-2xl font-display font-semibold text-[#1A1A1A]">💰 Prix : {{ number_format($articleD->price, 2) }}€</p>

            <button type="button" data-id="{{ $articleD->id }}" class="btn-primary btn-panier w-full py-3 rounded-full bg-[#1A1A1A] text-white hover:bg-[#C89B6D] flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13L17 13M10 21h4"/>
                </svg>
                Ajouter au panier
            </button>

            <a href="{{ route('home') }}" class="text-[#6B6B6B] hover:text-[#1A1A1A] mt-4 inline-block">← Retour aux articles</a>
        </div>
    </div>
</main>

<footer class="bg-white py-16 px-6 mt-20">
    <div class="max-w-7xl mx-auto text-center text-sm text-[#6B6B6B]">
        © {{ date('Y') }} DecoM. Tous droits réservés.
    </div>
</footer>

<!-- JS pour ajout panier Ajax -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('.btn-panier');
    if(button){
        button.addEventListener('click', async function() {
            const id = this.dataset.id;
            try {
                await fetch('{{ route("panier.ajouterAjax") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id })
                });
            } catch (error) {
                console.error(error);
            }
        });
    }
});
</script>

</body>
</html>
