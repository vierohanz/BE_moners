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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->enum('transaction type', ['income', 'expense']);
            $table->enum('category type', ['transport', 'eat', 'dating', 'others']);
            $table->string('description', 100);
            $table->timestamps();
            $table->unsignedInteger('user id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
