<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mon panier</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#788a74',   // Bleu principal
            secondary: '#F472B6', // Rose doux
            accent: '#CDAA54',    // gold 
            dark: '#B8C2B2', 
            hovi: '#556352' 
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body class="bg-light text-dark font-sans">

  <!-- 🔝 Navbar -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">🛍️ DecoM</a>
      <nav class="space-x-4">
        <a href="{{ route('home') }}" class="text-dark hover:text-primary">Accueil</a>
        <a href="{{ route('panier') }}" class="text-dark hover:text-primary">Panier</a>
      </nav>
    </div>
  </header>

  <!-- 🛒 Contenu du panier -->
  <main class="max-w-4xl mx-auto px-6 py-10 bg-white shadow-lg rounded-xl mt-12">

    <h1 class="text-3xl font-bold text-center text-primary mb-8">🛒 Mon panier</h1>

    @php $somme = 0; @endphp

    @forelse($panier as $id => $produit)
      <div class="border-b border-gray-300 py-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="flex items-center gap-4">
          @if (isset($produit['image']))
            <img src="{{ asset('storage/' . $produit['image']) }}" alt="Image" class="w-24 h-24 object-cover rounded">
          @endif
          <div>
            <h2 class="text-xl font-semibold">{{ $produit['title'] }}</h2>
            <p class="text-gray-600">Prix : {{ $produit['price'] }} MAD</p>
            <p class="text-gray-600">Quantité : {{ $produit['quantity'] }}</p>
          </div>
        </div>

        <div class="flex gap-2">
          <form method="POST" action="{{ route('ajouter', $id) }}">
            @csrf
            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-green-700">+</button>
          </form>

          <form method="POST" action="{{ route('supprimer', $id) }}">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">-</button>
          </form>
        </div>
      </div>

      @php $somme += $produit['price'] * $produit['quantity']; @endphp

    @empty
      <p class="text-center text-gray-500">Votre panier est vide.</p>
    @endforelse

    <div class="mt-8 text-right text-2xl font-bold text-accent">
      🧾 Total : {{ $somme }} MAD
    </div>

    <div class="mt-6 flex justify-between text-sm text-gray-600">
      <a href="{{ route('home') }}" class="hover:underline">← Retour aux articles</a>
      <a href="{{ url()->previous() }}" class="hover:underline">← Page précédente</a>
    </div>
  </main>

  <!-- 📌 Footer -->
  <footer class="bg-dark text-white py-6 mt-16">
    <div class="text-center">
      <p>&copy; {{ date('Y') }} Ma Boutique. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>
