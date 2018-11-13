<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickUpRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_up_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->default('unfulfilled');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('age');
            $table->string('gender')->default('');
            $table->string('phone_number');
            $table->string('pick_up_address');
            $table->string('destination_address');
            $table->string('bringing_items')->default('no')->nullable();
            $table->time('time');
            $table->date('date');
            $table->integer('number_of_passengers')->default(1);
            $table->string('duration_of_service')->default('')->nullable();
            $table->string('driver_gender')->default('{"male":"true","female":"true"}')->nullable();
            $table->string('special_services')->default('')->nullable();
            $table->string('special_services_information')->default('')->nullable();
            $table->string('additional_information')->default('')->nullable();
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
        Schema::dropIfExists('pick_up_requests');
    }
}
