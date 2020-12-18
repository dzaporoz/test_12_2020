<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string("ua", 200)->nullable();
            $table->ipAddress("ip");
            $table->string("ref", 410)->nullable();
            $table->string("param1", 100)->nullable();
            $table->string("param2", 100)->nullable();
            $table->unsignedInteger("error")->default(0);
            $table->bigInteger("bad_domain")->default(0);

            $table->primary('id');
            $table->index(['ip', 'ua', 'ref', 'param1']);
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
