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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('name');
            $table->string('document_type');
            $table->string('dependency');
            $table->string('department');
            $table->date('date');
            $table->string('number');
            $table->string('sender');
            $table->string('sender_position');
            $table->string('theme');
            $table->string('subject');
            $table->unsignedBigInteger('assigned_area');
            $table->foreign('assigned_area')->references('id')->on('areas');
            $table->string('observations')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
