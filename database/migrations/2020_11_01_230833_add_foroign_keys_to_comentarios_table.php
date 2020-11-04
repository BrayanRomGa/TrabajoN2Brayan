<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForoignKeysToComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comentarios', function (Blueprint $table) {
                    //campos que se van a agregar a la tabla comentarios
            $table->unsignedBigInteger('id_persona');
            $table->unsignedBigInteger('id_producto');
            
                            //referencia origen      destino    tablaDestino
            $table->foreign('id_persona')->references('id')->on('personas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_producto')->references('id')->on('productos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign('id_producto');
            $table->dropForeign('id_persona');

            $table->dropColumn('id_persona');
            $table->dropColumn('id_producto');



        });
    }
}
