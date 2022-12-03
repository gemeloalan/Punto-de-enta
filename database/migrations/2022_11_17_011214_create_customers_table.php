<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->bigInteger('telefono')->unique();
            $table->string('direccion');
            $table->string('image');
            /* Creating a foreign key to the `states` table. */
            $table->foreignId('state_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('municipality_id')->nullable()->constrained()->onDelete('set null');
         
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
