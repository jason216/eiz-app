<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('account_id');
			$table->string('email')->unique()->index();
            $table->string('username', 50);
			$table->string('name', 50);
            $table->string('password');
            $table->enum('role', ['user', 'admin', 'superadmin'])->default('user');
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
