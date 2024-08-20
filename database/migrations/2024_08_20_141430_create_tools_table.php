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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('tool_name');
            $table->string('tool_slug');
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->bigInteger('language_id');
            $table->boolean('is_home')->default(0);
            $table->string('parent')->nullable();
            $table->json('content_keys')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
