<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mon Panier - DecoM</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body { font-family: 'Inter', sans-serif; background: #FAFAF8; color: #1A1A1A; }
    .font-display { font-family: 'Cormorant Garamond', serif; }
    .nav-glass { background: rgba(250, 250, 248, 0.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(26,26,26,0.08); }
    .product-card { transition: all 0.3s ease; border-radius: 1.25rem; }
    .product-card:hover { transform: translateY(-6px); box-shadow: 0 10px 25px rgba(26,26,26,0.1); }
    .hero-overlay { background: rgba(0,0,0,0.45); }
  </style>
</head>

<body>

  <!-- 🧭 NAVBAR -->
  <nav class="nav-glass fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between h-20 items-center">
      <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
        <div class="w-10 h-10 bg-[#1A1A1A] rounded-full flex items-center justify-center transition-transform group-hover:rotate-180 duration-500">
          <span class="text-[#FAFAF8] font-display text-xl font-semibold">D</span>
        </div>
        <span class="font-display text-2xl font-semibold text-[#1A1A1A]">DecoM</span>
      </a>

      <div class="hidden md:flex items-center space-x-10">
        <a href="{{ route('home') }}" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574]">Accueil</a>
        <a href="{{ route('panier') }}" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574]">Panier</a>
        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-[#1A1A1A] hover:text-[#D4A574]">Profil</a>
      </div>

      <div class="flex items-center space-x-4">
        @auth
          <span class="text-[#6B6B6B]">Bonjour, {{ Auth::user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-4 py-2 rounded-full text-sm bg-[#1A1A1A] text-white hover:bg-[#C89B6D] transition">Déconnexion</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-sm font-medium text-[#6B6B6B] hover:text-[#1A1A1A]">Connexion</a>
          <a href="{{ route('register') }}" class="px-6 py-2.5 bg-[#1A1A1A] text-white text-sm font-medium rounded-full hover:bg-[#2A2A2A]">Inscription</a>
        @endauth
      </div>
    </div>
  </nav>

  <!-- 🖼️ HERO SECTION -->
  <section class="relative h-[85vh] flex items-center justify-center mt-20">
    <div class="absolute inset-0">
      <img src="{{ asset('storage/images/panier.jpg') }}" alt="Panier DecoM" class="w-full h-full object-cover">
      <div class="hero-overlay absolute inset-0"></div>
    </div>
    <div class="relative z-10 text-center px-6">
      <h1 class="font-display text-6xl md:text-8xl font-light text-white mb-6 leading-tight">
        Votre Panier
      </h1>
      <p class="text-lg md:text-xl text-white/90 font-light max-w-2xl mx-auto mb-10">
        Découvrez les créations que vous avez sélectionnées pour sublimer votre intérieur.
      </p>
      <a href="{{ route('home') }}" class="inline-block px-10 py-4 bg-white text-[#1A1A1A] rounded-full font-semibold text-sm hover:bg-[#FAFAF8] transition-all duration-300">
        Continuer vos achats
      </a>
    </div>
  </section>

  <!-- 🛒 CONTENU DU PANIER -->
  <main class="max-w-6xl mx-auto px-6 py-20">
    @php $total = 0; @endphp

    @if(empty($panier))
      <div class="text-center py-20">
        <p class="text-[#6B6B6B] text-lg">Votre panier est vide.</p>
      </div>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($panier as $id => $produit)
          <div class="product-card bg-white p-6 flex flex-col md:flex-row items-center gap-6">
            <img src="{{ asset('storage/' . $produit['image']) }}" alt="{{ $produit['title'] }}" class="w-40 h-40 object-cover rounded-xl">
            <div class="flex-1">
              <h2 class="font-display text-2xl font-semibold mb-2">{{ $produit['title'] }}</h2>
              <p class="text-[#6B6B6B] mb-2">Prix : {{ $produit['price'] }} MAD</p>
              <p class="text-[#6B6B6B]">Quantité : {{ $produit['quantity'] }}</p>
            </div>

            <div class="flex flex-col gap-2">
              <form method="POST" action="{{ route('ajouter', $id) }}">
                @csrf
                <button class="px-4 py-2 rounded-full bg-[#1A1A1A] text-white hover:bg-[#C89B6D]">+</button>
              </form>

              <form method="POST" action="{{ route('supprimer', $id) }}">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-full bg-red-600 text-white hover:bg-red-700">−</button>
              </form>
            </div>
          </div>
          @php $total += $produit['price'] * $produit['quantity']; @endphp
        @endforeach
      </div>

      <div class="mt-12 flex flex-col md:flex-row justify-between items-center">
        <span class="font-display text-3xl font-semibold mb-6 md:mb-0">🧾 Total : {{ $total }} MAD</span>
         <form action="{{ route('commande.create') }}" method="GET">
    <button type="submit" class="px-10 py-4 bg-[#1A1A1A] text-white rounded-full font-semibold hover:bg-[#C89B6D] transition-all duration-300">
        Valider la commande
    </button>
</form>

      </div>
    @endif
  </main>

  <!-- ⚫ FOOTER -->
  <footer class="bg-white py-16 px-6 mt-24 border-t border-[#EAEAEA]">
    <div class="max-w-7xl mx-auto text-center">
      <p class="text-[#6B6B6B] text-sm">© {{ date('Y') }} DecoM. Tous droits réservés.</p>
      <p class="text-[#6B6B6B] text-sm mt-2">Design by Assia ✨</p>
    </div>
  </footer>

</body>
</html>
