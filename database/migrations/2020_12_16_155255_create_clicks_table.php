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
        Schema::create('clicks', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string("ua", 200);
            $table->ipAddress("ip");
            $table->string("ref", 2050)->nullable();
            $table->string("param1", 2050)->nullable();
            $table->string("param2", 2050)->nullable();
            $table->unsignedInteger("error")->default(0);
            $table->bigInteger("bad_domain")->default(0);

            $table->primary('id');
            $table->unique(["ip", "ref", "ua", "param1"], "ip_ref_ua_param1_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
