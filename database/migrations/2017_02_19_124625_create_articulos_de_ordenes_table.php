<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosDeOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_de_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('precio', 16, 2);
            $table->integer('cantidad')->unsigned();;
            $table->integer('ordenes_id')->unsigned();
            $table->foreign('ordenes_id')
                  ->references('id')
                  ->on('ordenes')
                  ->onDelete('cascade');
            $table->integer('productos_id')->unsigned();
            $table->foreign('productos_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_de_ordenes');
    }
}
