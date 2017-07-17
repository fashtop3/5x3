<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('data')->nullable();
            $table->integer('level_id')->nullable()->unsigned();
            $table->foreign('level_id')
                ->references('id')
                ->on('levels');
            $table->integer('upline_id')->nullable()->unsigned();
            $table->foreign('upline_id')
                ->references('id')
                ->on('users');
            $table->integer('level_assert')->unsigned();
            $table->foreign('level_assert')
                ->references('id')
                ->on('levels');
            $table->boolean('payment')->default(0);
            $table->boolean('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
