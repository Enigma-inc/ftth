<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_personal_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('surname',150);
            $table->string('email',200);
            $table->string('identity_number',100);
            $table->string('mobile_phone',150);
            $table->string('home_phone',150)->nullable();
            $table->string('office_phone',150)->nullable();
            $table->text('postal_address');
            $table->text('physical_address');
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
        Schema::dropIfExists('applicant_personal_details');
    }
}
