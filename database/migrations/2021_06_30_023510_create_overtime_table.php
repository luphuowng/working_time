<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtime', function ($table) {
            $table->increments('id_OT', true);
            $table->bigInteger('id_user')->unsigned(); // nguoi xin don lam
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('reason')->nullable(); // ly do lam
            $table->integer('number');    // so gio lam
            $table->boolean('status')->default(0);  // trang thai
            $table->bigInteger('id_Admin')->unsigned()->nullable();   // nguoi duyet
            $table->foreign('id_Admin')->references('id')->on('users');
            $table->datetime('approved_time')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });

       

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overtime');
    }
}
