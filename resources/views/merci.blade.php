<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Merci pour votre commande - DecoM</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Cormorant Garamond', serif; }
    .hero-bg {
      background: url('{{ asset("storage/images/background2.jpg") }}') center/cover no-repeat;
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .overlay {
      position: absolute; inset: 0;
      background: rgba(26, 26, 26, 0.55);
      backdrop-filter: blur(5px);
    }
    .card-glass {
      backdrop-filter: blur(15px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 2rem;
      padding: 3rem;
      max-width: 500px;
      width: 100%;
      text-align: center;
      color: #fff;
      box-shadow: 0 20px 50px rgba(0,0,0,0.25);
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
<body class="flex flex-col min-h-screen">

  <!-- HEADER -->
  <nav class="nav-glass fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <a href="/" class="flex items-center space-x-3 group">
          <div class="w-10 h-10 bg-[#1A1A1A] rounded-full flex items-center justify-center transition-transform group-hover:rotate-180 duration-500">
            <span class="text-[#FAFAF8] font-display text-xl font-semibold">D</span>
          </div>
          <span class="font-display text-2xl font-semibold text-[#FAFAF8] tracking-tight">DecoM</span>
        </a>

        <div class="hidden md:flex items-center space-x-10">
          <a href="{{ route('home') }}" class="text-sm font-medium text-[#E6E6E6] hover:text-[#D4A574] transition-colors duration-300">Accueil</a>
          <a href="{{ route('panier') }}" class="text-sm font-medium text-[#E6E6E6] hover:text-[#D4A574] transition-colors duration-300">Panier</a>
          <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-[#E6E6E6] hover:text-[#D4A574] transition-colors duration-300">Profil</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- HERO / CONTENU -->
  <section class="hero-bg flex-1 relative">
    <div class="overlay"></div>

    <div class="card-glass z-10">
      <div class="w-20 h-20 mx-auto mb-6">
        <svg class="w-full h-full text-[#C89B6D]" fill="none" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
      </div>

      <h1 class="text-3xl font-display font-semibold mb-4 text-white">Merci pour votre commande ✨</h1>
      <p class="mb-6 text-gray-100">Votre commande a été enregistrée avec succès.<br>Un e-mail de confirmation vous a été envoyé.</p>

      <div class="text-left mb-6 space-y-2 text-gray-100">
        <p><strong>Statut :</strong> {{ ucfirst($commande->statut) }}</p>
        <p><strong>Total :</strong> {{ $commande->total }} MAD</p>
        <p><strong>Adresse :</strong> {{ $commande->adresse }}</p>
      </div>

      <h2 class="text-xl font-semibold mb-3 text-[#FFDCA0]">🛍️ Articles commandés</h2>
      <ul class="space-y-2 text-left text-gray-100 mb-8">
        @foreach($commande->articles as $article)
          <li class="border-b border-white/20 pb-2 flex justify-between">
            <span>{{ $article->title }} (x{{ $article->pivot->quantite }})</span>
            <span>{{ $article->pivot->prix * $article->pivot->quantite }} MAD</span>
          </li>
        @endforeach
      </ul>

      <a href="{{ route('home') }}" class="btn-primary">Retour à la boutique</a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-[#1A1A1A] text-white py-8 text-center">
    <p>&copy; {{ date('Y') }} DecoM. Tous droits réservés.</p>
    <p class="text-sm text-white/70">Design by Assia ✨</p>
  </footer>

</body>
</html>
