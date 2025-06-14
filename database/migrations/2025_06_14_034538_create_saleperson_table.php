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
        Schema::create('saleperson', function (Blueprint $table) {
            $table->id(); 
             $table->unsignedBigInteger('role_id');
            $table->string('name')->nullable()->comment('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saleperson');
    }
};
