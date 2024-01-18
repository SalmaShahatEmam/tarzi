<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            /////
            $table->string('kom_height');
            $table->string('kom_width');

            $table->string('kitf_height');
            $table->string('gero_width');

            $table->string('mard_height');

            $table->string('sadr_height');
            $table->string('sadr_width');
            $table->string('west_width');
//////////////////////////////////////////
            $table->string('hnsh_height');
            $table->string('kamar_width');
            $table->string('higr_height');
            $table->string('fakhd_height');
            $table->string('regl_height');
            $table->string('auter_height');
            $table->string('from_higr_height');





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
        Schema::dropIfExists('clients');
    }
}
