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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('drugs');
            $table->integer('quanity')->default(0);
            $table->decimal('amount', 5, 2);
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('total', 5, 2)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('drugs')->references('id')->on('medicines');
            $table->foreign('order_id')->references('id')->on('prescriptions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
