<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id_order');
            $table->integer('no_meja');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_user');
            $table->text('keterangan');
            $table->enum('status_order', ['proses','batal','tunda']);
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id_user')
            ->on('users');
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
