<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DecoM - Design d'Exception</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-panier');

    buttons.forEach(button => {
        button.addEventListener('click', async function() {
            const id = this.getAttribute('data-id');

            try {
                await fetch('{{ route("panier.ajouterAjax") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id })
                });
                // Rien ne s'affiche, on reste sur la page
            } catch (error) {
                console.error("Erreur lors de l'ajout au panier", error);
            }
        });
    });
});
</script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #FAFAF8;
            color: #1A1A1A;
        }

        .font-display {
            font-family: 'Cormorant Garamond', serif;
        }

        /* Navigation glassmorphism */
        .nav-glass {
            background: rgba(250, 250, 248, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(26, 26, 26, 0.08);
        }

        /* Hero parallax effect */
        .hero-section {
            position: relative;
            overflow: hidden;
        }

        .hero-overlay {
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.7) 0%, rgba(26, 26, 26, 0.3) 100%);
        }

        /* Product card hover effects */
        .product-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 26, 26, 0) 0%, rgba(26, 26, 26, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(26, 26, 26, 0.15);
        }

        .product-card img {
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        /* Button animations */
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Category cards */
        .category-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-card:hover {
            transform: translateY(-8px);
        }

        /* Search input focus */
        .search-input:focus {
            box-shadow: 0 0 0 4px rgba(26, 26, 26, 0.05);
        }

        /* Accent line animation */
        .accent-line {
            position: relative;
        }

        .accent-line::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 2px;
            background: #D4A574;
        }

        /* Grid asymmetric layout */
        .grid-asymmetric > *:nth-child(3n+1) {
            grid-column: span 2;
        }

        @media (max-width: 768px) {
            .grid-asymmetric > *:nth-child(3n+1) {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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

 class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574] transition-colors duration-300">Accueil</a>
                    <a href="/a-propos" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574] transition-colors duration-300">À propos</a>
                    <a href="#contact" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574] transition-colors duration-300">Contact</a>
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
    </nav>

    <!-- Hero Section -->
    <section class="hero-section relative h-screen flex items-center justify-center mt-20">
        <div class="absolute inset-0">
           <img src="{{ asset('storage/images/background2.jpg') }}" 
     alt="Hero" 
     class="w-full h-full object-cover">

            <div class="hero-overlay absolute inset-0"></div>
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
            <h1 class="font-display text-6xl md:text-8xl lg:text-9xl font-light text-white mb-6 tracking-tight leading-none">
                Design<br>d'Exception
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-12 max-w-2xl mx-auto font-light leading-relaxed">
                Transformez votre espace avec des pièces uniques qui racontent une histoire
            </p>
            <a href="#collection" class="btn-primary inline-block px-10 py-4 bg-white text-[#1A1A1A] text-sm font-semibold rounded-full hover:bg-[#FAFAF8] transition-all duration-300">
                Découvrir la Collection
            </a>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-display text-5xl md:text-6xl font-light text-[#1A1A1A] mb-4 accent-line inline-block">Nos Univers</h2>
                <p class="text-[#6B6B6B] text-lg mt-8">Explorez nos collections soigneusement sélectionnées</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="category-card group cursor-pointer">
                    <div class="relative h-96 rounded-2xl overflow-hidden mb-6">
                        <img src="{{ asset('storage/images/lampe.jpg') }}" 
                             alt="Luminaires" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1A1A]/60 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <h3 class="font-display text-3xl font-semibold text-white mb-2">Luminaires</h3>
                            <p class="text-white/80 text-sm">Éclairez avec style</p>
                        </div>
                    </div>
                </div>

                <div class="category-card group cursor-pointer">
                    <div class="relative h-96 rounded-2xl overflow-hidden mb-6">
                        <img src="{{ asset('storage/images/vase.jpg') }}"
                             alt="Vases" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1A1A]/60 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <h3 class="font-display text-3xl font-semibold text-white mb-2">Vases</h3>
                            <p class="text-white/80 text-sm">L'art de la céramique</p>
                        </div>
                    </div>
                </div>

                <div class="category-card group cursor-pointer">
                    <div class="relative h-96 rounded-2xl overflow-hidden mb-6">
                        <img src="{{ asset('storage/images/mug.jpg') }}" 
                             alt="Mugs" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A1A1A]/60 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <h3 class="font-display text-3xl font-semibold text-white mb-2">Mugs</h3>
                            <p class="text-white/80 text-sm">Moments précieux</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section id="collection" class="py-16 px-6 bg-[#FAFAF8]">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row gap-6 items-center justify-between mb-12">
                <!-- Search -->
                <div class="w-full md:w-96">
                    <form action="/" method="GET" class="relative">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Rechercher un produit..." 
                            class="search-input w-full px-6 py-4 bg-white border border-[#E5E5E5] rounded-full text-sm focus:outline-none focus:border-[#1A1A1A] transition-all duration-300">
                        <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-[#6B6B6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Sort & Filter -->
                <div class="flex gap-4 w-full md:w-auto">
                    <form action="/" method="GET" class="flex-1 md:flex-none">
                        <select name="sort" onchange="this.form.submit()" class="w-full md:w-48 px-6 py-4 bg-white border border-[#E5E5E5] rounded-full text-sm focus:outline-none focus:border-[#1A1A1A] transition-all duration-300 appearance-none cursor-pointer">
                            <option value="">Trier par</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nom</option>
                        </select>
                    </form>

                    <form action="/" method="GET" class="flex-1 md:flex-none">
                        <select name="category" onchange="this.form.submit()" class="w-full md:w-48 px-6 py-4 bg-white border border-[#E5E5E5] rounded-full text-sm focus:outline-none focus:border-[#1A1A1A] transition-all duration-300 appearance-none cursor-pointer">
                            <option value="">Catégorie</option>
                            <option value="lamp" {{ request('category') == 'lamp' ? 'selected' : '' }}>Lampes</option>
                            <option value="vase" {{ request('category') == 'vase' ? 'selected' : '' }}>Vases</option>
                            <option value="mug" {{ request('category') == 'mug' ? 'selected' : '' }}>Mugs</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </section>

  <!-- Products Grid -->
<section class="py-20 px-6 bg-[#FAFAF8]">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @forelse($articles as $article)
        <article class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 group relative flex flex-col">
          <!-- Image -->
          <div class="relative h-72 overflow-hidden">
            <img 
              src="{{ asset('storage/' . $article->image) }}" 
              alt="{{ $article->title }}" 
              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
            >
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-500 flex items-center justify-center"> <a href="{{ route('details', $article->id) }}" class="opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-500 px-6 py-2.5 bg-white text-[#1A1A1A] text-sm font-semibold rounded-full shadow hover:bg-[#F7F7F5]" > Voir les détails </a> </div>

          </div>

          <!-- Contenu -->
          <div class="p-6 flex-1 flex flex-col justify-between">
            <div>
              <h3 class="font-display text-xl font-semibold text-[#1A1A1A] mb-2 group-hover:text-[#C89B6D] transition-colors duration-300">
                {{ $article->title }}
              </h3>
              <p class="text-[#6B6B6B] text-sm leading-relaxed mb-4 line-clamp-3">
                {{ $article->content }}
              </p>
            </div>

            <!-- Section bas : bouton + prix + catégorie -->
            <div class="mt-auto flex flex-col gap-3 border-t border-[#EAEAEA] pt-4">
              <button type="button" data-id="{{ $article->id }}" class="btn-panier w-full bg-[#1A1A1A] text-white py-2 rounded-full text-sm font-semibold tracking-wide hover:bg-[#C89B6D] transition-all duration-300 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13L17 13M10 21h4"/>
                </svg>
                Ajouter au panier
              </button>

              <div class="flex items-center justify-between">
                <span class="font-display text-2xl font-semibold text-[#1A1A1A]">
                  {{ number_format($article->price, 2) }} MAD
                </span>
                <span class="text-xs font-medium text-[#C89B6D] uppercase tracking-wide">
                  {{ $article->categories }}
                </span>
              </div>
            </div>
          </div>
        </article>
      @empty
        <div class="col-span-full text-center py-20">
          <div class="inline-block p-8 bg-white rounded-2xl">
            <p class="font-display text-2xl text-[#1A1A1A] mb-2">Aucun produit trouvé</p>
            <p class="text-[#6B6B6B]">Essayez de modifier vos critères de recherche</p>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>




    <!-- Newsletter Section -->


   <!-- Footer -->
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
          <li><a href="/a-propos" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">À propos</a></li>
          <li><a href="/contact" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Contact</a></li>
        </ul>
      </div>

      <!-- Categories -->
      <div>
        <h3 class="font-semibold text-[#C89B6D] mb-4 text-sm uppercase tracking-wider">Catégories</h3>
        <ul class="space-y-3">
          <li><a href="/?category=lamp" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Lampe</a></li>
          <li><a href="/?category=vase" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Vases</a></li>
          <li><a href="/?category=mug" class="text-gray-300 hover:text-[#C89B6D] transition-colors duration-300 text-sm">Mugs</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h3 class="font-semibold text-[#C89B6D] mb-4 text-sm uppercase tracking-wider">Contact</h3>
        <ul class="space-y-3 text-sm text-gray-300">
          <li>26 Rue d'andromède</li>
          <li>Casablanca,Maroc</li>
          <li class="pt-2"><a href="mailto:hello@decom.fr" class="hover:text-[#C89B6D] transition-colors duration-300">hcontact@decom.com</a></li>
          <li><a href="tel:+33123456789" class="hover:text-[#C89B6D] transition-colors duration-300">+212 7 58 96 33 65</a></li>
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
</body>
</html>