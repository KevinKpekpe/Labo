<?php

use App\Models\Docteur;
use App\Models\Patient;
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
        Schema::create('bon_labos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignIdFor(Docteur::class)->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamp('date_prescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_labos');
    }
};
