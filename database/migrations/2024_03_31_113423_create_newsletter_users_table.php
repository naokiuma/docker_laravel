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
        Schema::create('newsletter_users', function (Blueprint $table) {
            $table->id();
			$table->uuid()->comment('ユニークID');
			$table->string('name')->comment('名前');
			$table->string('email')->unique()->comment('メールアドレス');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_users');
    }
};
