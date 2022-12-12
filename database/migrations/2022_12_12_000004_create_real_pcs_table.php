<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealPcsTable extends Migration
{
    public function up()
    {
        Schema::create('real_pcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
