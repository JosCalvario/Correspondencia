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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('email');
            $table->date('date');
            $table->string('recieves');
            $table->string('position');
            $table->string('subject');
            $table->string('applicant_id');
            $table->foreignId('area_id')->constrained();
            $table->string('document_type');
            $table->string('status');
            $table->string('cancelation')->nullable();
            $table->string('document')->nullable();
            $table->foreignId('request_id')->constrained();
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
        Schema::dropIfExists('responses');
    }
};
