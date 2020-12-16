<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("ua", 200);
            $table->ipAddress("ip");
            $table->string("ref", 2050);
            $table->string("param1", 2050);
            $table->text("param2");
            $table->unsignedInteger("error");
            $table->bigInteger("bad_domain");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('click');
    }
}
