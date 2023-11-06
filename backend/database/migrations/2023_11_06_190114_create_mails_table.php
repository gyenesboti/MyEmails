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
        Schema::create('mails', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignId("id_user_from")->nullable()->constrained('users', 'id');
            $table->foreignId("id_user_to")->nullable()->constrained('users', 'id');
            $table->string("subject");
            $table->text("message");
            $table->boolean("is_read");
            $table->timestamp("sent")->nullable();
            $table->timestamp("created");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
