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
            $table->boolean('is_complete')->default(0);
            $table->float('amount')->default(0);
            $table->boolean('is_billing_agreed')->default(0);
            $table->boolean('is_inspected')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_installed')->default(0);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('applicant_personal_info_id');
            $table->unsignedInteger('applicant_banking_details_id')->nullable();
            $table->unsignedInteger('applicant_service_type_id')->nullable();
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
