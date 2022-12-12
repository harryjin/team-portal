<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemotePcsTable extends Migration
{
    public function up()
    {
        Schema::create('remote_pcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rid');
            $table->string('rpassword');
            $table->string('login')->nullable();
            $table->string('lpassword')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
