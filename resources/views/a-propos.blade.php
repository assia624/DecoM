<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>À propos - DecoM</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; color: #1A1A1A; }
    .font-display { font-family: 'Cormorant Garamond', serif; }
    .highlight { color: #C89B6D; }
  </style>
</head>
<body class="flex flex-col min-h-screen bg-[#FAFAF8]">

  <!-- HEADER -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-[#1A1A1A]/30 backdrop-blur-sm border-b border-[#ffffff1a]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-[#1A1A1A] rounded-full flex items-center justify-center transition-transform group-hover:rotate-180 duration-500">
                        <span class="text-[#FAFAF8] font-display text-xl font-semibold">D</span>
                    </div>
                    <span class="font-display text-2xl font-semibold text-[#FAFAF8] tracking-tight">DecoM</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="/" class="text-sm font-medium text-[#FAFAF8] hover:text-[#D4A574] transition-colors duration-300">Accueil</a>
                    <a href="/a-propos" class="text-sm font-medium text-[#FAFAF8] hover:text-[#D4A574] transition-colors duration-300">À propos</a>
                    <a href="#contact" class="text-sm font-medium text-[#FAFAF8] hover:text-[#D4A574] transition-colors duration-300">Contact</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-6">
                    @guest
                       <a href="{{ route('panier') }}"  class="relative group">
                            <svg class="w-6 h-6 text-[#D4A574] group-hover:text-[#FAFAF8] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </a>
                        <a href="/login" class="hidden md:inline-block text-sm font-medium text-[#FAFAF8] hover:text-[#1A1A1A] transition-colors duration-300">Connexion</a>
                        <a href="/register" class="px-6 py-2.5 bg-[#D4A574] text-[#FAFAF8] text-sm font-medium rounded-full hover:bg-[#2A2A2A] transition-all duration-300">S'inscrire</a>
                    @else
                        <a href="{{ route('panier') }}"  class="relative group">
                            <svg class="w-6 h-6 text-[#FAFAF8] group-hover:text-[#D4A574] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

  <!-- SECTION HERO -->
  <section class="relative bg-cover bg-center h-[60vh]" style="background-image: url('{{ asset('storage/images/background2.jpg') }}');">
    <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-center text-white px-6">
      <h1 class="text-5xl font-display font-semibold mb-4">À propos de <span class="highlight">DecoM</span></h1>
      <p class="max-w-2xl text-lg">L’élégance et le confort réunis pour sublimer votre intérieur.</p>
    </div>
  </section>

  <!-- SECTION DESCRIPTION -->
  <section class="max-w-6xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <h2 class="text-3xl font-display font-semibold mb-4">Notre histoire</h2>
      <p class="text-gray-700 mb-4 leading-relaxed">
        <span class="highlight font-semibold">DecoM</span> est une boutique spécialisée dans la vente de meubles modernes et élégants.  
        Notre mission est d’apporter à chaque foyer une touche de raffinement grâce à des pièces au design épuré et intemporel.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Nous sélectionnons des matériaux de qualité et collaborons avec des artisans passionnés pour créer des meubles à la fois esthétiques et durables.
      </p>
    </div>

    <img src="{{ asset('storage/images/showroom.png') }}" alt="Showroom DecoM" class="rounded-2xl shadow-lg">
  </section>

  <!-- SECTION PRODUITS -->
  <section class="bg-[#1A1A1A] text-white py-16">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-display mb-8">Nos <span class="highlight">Collections</span></h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white/10 rounded-2xl p-6 hover:bg-white/20 transition">
          <img src="{{ asset('storage/images/feuteuille.jpeg') }}" alt="Fauteuil" class="rounded-xl mb-4 w-full h-48 object-cover">
          <h3 class="text-xl font-semibold highlight mb-2">Fauteuils & Canapés</h3>
          <p class="text-gray-300 text-sm">Des assises confortables au design raffiné, parfaites pour vos salons modernes.</p>
        </div>

        <div class="bg-white/10 rounded-2xl p-6 hover:bg-white/20 transition">
          <img src="{{ asset('storage/images/table.jpeg') }}" alt="Table" class="rounded-xl mb-4 w-full h-48 object-cover">
          <h3 class="text-xl font-semibold highlight mb-2">Tables & Chaises</h3>
          <p class="text-gray-300 text-sm">Des pièces élégantes alliant fonctionnalité et esthétique contemporaine.</p>
        </div>

        <div class="bg-white/10 rounded-2xl p-6 hover:bg-white/20 transition">
          <img src="{{ asset('storage/images/lampe.jpg') }}" alt="Lampe" class="rounded-xl mb-4 w-full h-48 object-cover">
          <h3 class="text-xl font-semibold highlight mb-2">Éclairage & Déco</h3>
          <p class="text-gray-300 text-sm">Des luminaires et accessoires qui apportent chaleur et ambiance à votre espace.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION MAP -->
  <section class="py-16 bg-[#FAFAF8]">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-display font-semibold mb-6">📍 Où nous trouver</h2>
      <p class="text-gray-700 mb-8">Notre showroom est situé au cœur de Casablanca. Venez découvrir nos collections sur place.</p>
      <div class="overflow-hidden rounded-2xl shadow-lg">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.734050917034!2d-7.6209438!3d33.5928691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cdcfb8c4a3bb%3A0x5f7f7ebbe33400a!2sCasablanca!5e0!3m2!1sfr!2sma!4v1698350000000"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
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

</body>
</html>
