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
        Schema::create('newsletter_user_actions', function (Blueprint $table) {
            $table->id();
			// Cookie に保存されている ID を想定
			$table->unsignedBigInteger('newsletter_user_id')->comment('メルマガユーザー ID'); 

			// App\Enums\NewsletterUserActionType で定義
			$table->string('action_type')->comment('ユーザーの行動タイプ');
            $table->timestamps();
			$table->foreign('newsletter_user_id')->references('id')->on('newsletter_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_user_actions');
    }
};
