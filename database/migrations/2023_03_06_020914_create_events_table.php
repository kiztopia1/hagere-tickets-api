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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();;
            $table->string('name');
            $table->decimal('price',5,2);
            $table->when('date');
            $table->string('description')->nullable();
            $table->string('overview')->nullable();
            $table->timestamps();
            $table->string('tags')->nullable();
            $table->string('location');
            $table->string('slug')->nullable();
            $table->string('refund_policy')->nullable();
            $table->string('thumbnail');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
