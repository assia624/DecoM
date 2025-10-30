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
                    <a href="/a-propos" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">À propos</a>
                    <a href="#contact" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors duration-300">Contact</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-6">
                    @guest
                       <a href="{{ route('panier') }}"  class="relative group">
                            <svg class="w-6 h-6 text-[#1A1A1A] group-hover:text-[#D4A574] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </a>
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

<main class="pt-32 max-w-6xl mx-auto px-6 my-16">
    <div class="flex flex-col md:flex-row gap-12">
        <!-- Image -->
        <div class="flex-1 rounded-3xl overflow-hidden shadow-lg">
            @if($articleD->image)
                <img src="{{ asset('storage/' . $articleD->image) }}" alt="{{ $articleD->title }}" class="w-full h-full object-cover">
            @endif
        </div>

        <!-- Details -->
        <div class="flex-1 flex flex-col gap-6 m">
            <h1 class="font-display text-4xl font-semibold text-[#1A1A1A]">{{ $articleD->title }}</h1>
            <p class="text-[#6B6B6B] text-lg leading-relaxed">{{ $articleD->content }}</p>
            <p class="text-2xl font-display font-semibold text-[#1A1A1A]">Prix : {{ number_format($articleD->price, 2) }} MAD</p>

            <button type="button" data-id="{{ $articleD->id }}" class="btn-primary btn-panier w-full py-3 rounded-full bg-[#D4A574] text-white hover:bg-[#1A1A1A] flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13L17 13M10 21h4"/>
                </svg>
                Ajouter au panier
            </button>

            
        </div>
    </div>
</main>

<footer class="bg-[#1A1A1A] text-white py-16 px-6" id="contact">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
      <!-- Brand -->
      <div class="md:col-span-1">
        <div class="flex items-center space-x-3 mb-6">
          <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
            <span class="text-[#1A1A1A] font-display text-xl font-semibold">D</span>
          </div>
          <span class="font-display text-2xl font-semibold text-white">DecoM</span>
        </div>
        <p class="text-gray-300 text-sm leading-relaxed">
          Créer des espaces qui inspirent, une pièce à la fois.
        </p>
      </div>

      <!-- Links -->
      <div>
        <h3 class="font-semibold text-[#C89B6D] mb-4 text-sm uppercase tracking-wider">Navigation</h3>
        <ul class="space-y-3">
          <li><a href="/" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Accueil</a></li>
          <li><a href="/shop" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Boutique</a></li>
          <li><a href="/a-propos" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">À propos</a></li>
          <li><a href="/contact" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Contact</a></li>
        </ul>
      </div>

      <!-- Categories -->
      <div>
        <h3 class="font-semibold text-[#C89B6D] mb-4 text-sm uppercase tracking-wider">Catégories</h3>
        <ul class="space-y-3">
          <li><a href="/?category=lamp" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Luminaires</a></li>
          <li><a href="/?category=vase" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Vases</a></li>
          <li><a href="/?category=mug" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Mugs</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h3 class="font-semibold text-[#C89B6D] mb-4 text-sm uppercase tracking-wider">Contact</h3>
        <ul class="space-y-3 text-sm text-gray-300">
          <li>123 Rue du Design</li>
          <li>75001 Paris, France</li>
          <li class="pt-2"><a href="mailto:hello@decom.fr" class="hover:text-[#C89B6D] transition-colors duration-300">hello@decom.fr</a></li>
          <li><a href="tel:+33123456789" class="hover:text-[#C89B6D] transition-colors duration-300">+33 1 23 45 67 89</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom -->
    <div class="pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-gray-400 text-sm">© 2025 <span class="text-[#C89B6D]">DecoM</span>. Tous droits réservés.</p>
      <div class="flex gap-6">
        <!-- Facebook -->
        <a href="#" class="text-gray-400 hover:text-[#C89B6D] transition-colors duration-300">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
          </svg>
        </a>

        <!-- Instagram -->
        <a href="#" class="text-gray-400 hover:text-[#C89B6D] transition-colors duration-300">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.668-.014 4.948-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0z"/>
            <circle cx="12" cy="12" r="3.2"/>
          </svg>
        </a>

        <!-- Twitter -->
        <a href="#" class="text-gray-400 hover:text-[#C89B6D] transition-colors duration-300">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
          </svg>
        </a>
      </div>
    </div>
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
