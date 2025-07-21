<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accueil</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#788a74',   // Bleu principal
            secondary: '#F472B6', // Rose doux
            accent: '#CDAA54',    // gold 
            dark: '#B8C2B2',      // Gris foncé
          // Gris très clair
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light text-dark font-sans">

  <!-- 🔝 Navbar -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">🛍️ DecoM</a>
      <nav class="space-x-4">
        <a href="{{ route('home') }}" class="text-dark hover:text-primary transition">Accueil</a>
        <a href="{{ route('panier') }}" class="text-dark hover:text-primary transition">Panier</a>
        @auth
          <span class="text-gray-600">Bonjour, {{ Auth::user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="hover:underline" style="color: #40826D;">Déconnexion</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-dark hover:text-primary">Connexion</a>
          <a href="{{ route('register') }}" class="bg-secondary text-white px-3 py-1 rounded hover:bg-pink-500 transition">Inscription</a>
        @endauth
      </nav>
    </div>
  </header>

  <!-- 💡 Contenu -->
  <main class="container mx-auto px-4 py-10">

    <!-- 🔍 Recherche & Filtres -->
    <form action="{{ route('home') }}" method="GET" class="bg-white p-6 rounded-lg shadow mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
      <input type="text" name="q" placeholder="Recherche..."
        value="{{ request('q') }}"
        class="w-full md:w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary" />

      <select name="sort" class="w-full md:w-1/4 p-2 border border-gray-300 rounded focus:outline-none">
        <option value="">Trier par</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
      </select>

      <select name="categorie" class="w-full md:w-1/4 p-2 border border-gray-300 rounded">
        <option value="">Toutes les catégories</option>
        <option value="lampe" {{ request('categorie') == 'lampe' ? 'selected' : '' }}>Lampe</option>
        <option value="vase" {{ request('categorie') == 'vase' ? 'selected' : '' }}>Vase</option>
        <option value="mug" {{ request('categorie') == 'mug' ? 'selected' : '' }}>Mug</option>
      </select>
<img src="./" alt="">
      <button type="submit"
        class="bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">🔍 Chercher</button>
    </form>

    <!-- SECTION: Hero Banner -->
    <div class="relative h-screen  bg-cover bg-center" style="background-image: url('{{asset('storage/images/backgroundPhoto.jpg')}}')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>

        <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white p-4">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Bienvenue dans notre boutique</h1>
            <p class="text-xl max-w-xl drop-shadow-lg">Découvrez nos produits décoratifs uniques pour embellir votre intérieur.</p>
            <a href="#produit" class="mt-6 px-6 py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition duration-300">
                Explorer les produits
            </a>
        </div>
    </div>
    

    <!-- 🛍️ Produits -->
    <h2 id="produit" class="text-2xl font-semibold mb-6 text-primary mt-20">Articles disponibles</h2>
    <div  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse ($articles as $article)
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg hover:scale-105 transition transform duration-200">
          @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}"
              alt="Image de {{ $article->title }}"
              class="w-full h-48 object-cover rounded mb-3">
          @endif

          <h3 class="text-lg font-bold mb-2 text-dark">
            <a href="{{ route('details', $article->id) }}" class="hover:text-primary">{{ $article->title }}</a>
          </h3>
          <p class="text-gray-700 mb-2">{{ $article->price }} MAD</p>
          <a href="{{ route('details', $article->id) }}"
            class="inline-block bg-accent text-white px-4 py-2 rounded hover:bg-gold-700 transition text-sm font-medium">Voir détails</a>
        </div>
      @empty
        <p class="col-span-full text-center text-gray-500">Aucun article trouvé.</p>
      @endforelse
    </div>
  </main>

  <!-- 📌 Footer -->
  <footer class="bg-dark text-white py-6 mt-16">
    <div class="text-center">
      <p>&copy; {{ date('Y') }} Ma Boutique. Tous droits réservés.</p>
      <p class="text-sm text-white">Design by Assia ✨</p>
    </div>
  </footer>

</body>
</html>
