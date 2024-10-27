<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('telegraph_bots', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->string('name')->nullable();

            $table->timestamps();
        });

        \DefStudio\Telegraph\Models\TelegraphBot::query()->create([
            'token' => '7727126533:AAGDjkVUdgR5Sej0gqt0hmns7aruAWFxLXM',
            'name'  => 'bot'
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('telegraph_bots');
    }
};
