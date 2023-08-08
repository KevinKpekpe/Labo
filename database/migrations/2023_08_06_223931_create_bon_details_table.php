<?php

use App\Models\BonLabo;
use App\Models\Examen;
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
        Schema::create('bon_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BonLabo::class)->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignIdFor(Examen::class)->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('resultat')->nullable()->default(null);
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_details');
    }
};
