<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50)->nullable();
            $table->string('name',50);
            $table->string('surname',50);
            $table->string('email',30);
            $table->string('phone_home',20)->nullable();
            $table->string('phone_office',20)->nullable();
            $table->string('phone_mobile',20);
            $table->string('id_number',50);
            $table->boolean('existing_customer');
            $table->string('postal_address');
            $table->string('physical_address');
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
        Schema::dropIfExists('applications');
    }
}
