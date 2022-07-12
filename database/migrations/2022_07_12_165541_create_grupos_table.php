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
        Schema::create('grupo', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('quant_pub');
            $table->string('sup', 255);
            $table->string('aju', 255);
            $table->string('tel_sup', 15);
            $table->string('tel_aju', 15);
            $table->unsignedBigInteger('territorio_id');
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
        Schema::dropIfExists('grupo');
    }
};
