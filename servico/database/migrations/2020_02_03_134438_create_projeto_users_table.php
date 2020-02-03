<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('papel_id');
            $table->bigInteger('projeto_id');
            $table->bigInteger('user_id');

            $table->foreign('papel_id')
                ->references('id')
                ->on('papeis');

            $table->foreign('projeto_id')
                ->references('id')
                ->on('projetos');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('projeto_users');
    }
}
