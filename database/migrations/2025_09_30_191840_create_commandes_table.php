<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();  
            $table->string('user_id');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse');
            $table->decimal('total', 8, 2);
            $table->string('mode_paiement')->nullable();
            $table->string('statut')->default('en_attente');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
