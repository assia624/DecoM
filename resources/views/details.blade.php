<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Détails de l'article</title>
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
         
  <!-- 📦 Contenu -->
  <main class="max-w-3xl mx-auto p-8 bg-white shadow-lg mt-12 rounded-xl">
    <h1 class="text-3xl font-bold text-center text-primary mb-6">{{ $articleD->title }}</h1>

    @if ($articleD->image)
      <img src="{{ asset('storage/' . $articleD->image) }}" alt="Image de l'article"
        class="w-72 h-64 object-cover mx-auto rounded-lg shadow mb-6" />
    @endif

    <p class="text-lg text-gray-700 mb-4">{{ $articleD->content }}</p>
    <p class="text-xl font-semibold text-accent mb-6">💰 Prix : {{ $articleD->price }} MAD</p>

    <form method="POST" action="{{ route('ajouter', $articleD->id) }}" class="text-center mb-6">
      @csrf
      <button type="submit" class="bg-primary text-white px-6 py-2 rounded hover:bg-emerald-700 transition">
        ➕ Ajouter au panier
      </button>
    </form>

    <div class="flex justify-between text-sm text-gray-500">
      <a href="{{ route('home') }}" class="hover:underline">← Retour aux articles</a>
      <a href="{{ route('panier') }}" class="hover:underline">🛒 Voir mon panier</a>
    </div>
  </main>
     <div>
                <a href="storage/app/public/images/decom.png>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
  <!-- 📌 Footer -->
  <footer class="bg-dark text-white py-6 mt-16">
    <div class="text-center">
      <p>&copy; {{ date('Y') }} Ma Boutique. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>
