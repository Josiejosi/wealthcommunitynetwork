<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->bigIncrements('id') ;
            $table->float( 'amount' )->unsigned() ;
            $table->integer( 'status' ) ;
            $table->boolean('type') ; //0 = upliner, 1 = normal
            $table->integer('days');
            $table->integer('percentage');
            $table->bigInteger( 'user_id' )->nullable() ;
            $table->bigInteger( 'sender_id' )->unsigned() ;
            $table->dateTime( 'matures_at' ) ;
            $table->dateTime( 'expires_at' ) ;
            $table->timestamps() ;

            //$table->foreign('user_id')->references('id')->on('users') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
