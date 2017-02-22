<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('slug',255);
            $table->text('descripcion');
            $table->string('descripcion_corta',200);
            $table->decimal('precio',16,2);
            $table->string('imagen');
            $table->boolean('activo')->default(true);
            $table->timestamps();//Esto es para crear los created_at y updated_at
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categorias_id')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
