<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('hub_id');
            $table->text('address')->nullable();
            $table->string('area')->nullable();
            $table->string('map_link')->nullable();
            $table->integer('contact_person_id')->nullable()->comment('user_id');
            $table->string('contact_number')->nullable();
            $table->string('close_days')->nullable();
            $table->string('open_time')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('branches');
    }
}
