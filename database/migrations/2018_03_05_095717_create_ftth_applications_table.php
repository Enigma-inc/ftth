<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFtthApplicationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftth_applications', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('user_id')->unsigned();
                        $table->integer('location_id')->unsigned();
                        $table->integer('applicant_personal_details_id')->unsigned();
                        $table->integer('applicant_banking_details_id')->unsigned();
                        $table->integer('applicant_service_type_id')->unsigned();
                        $table->float('amount')->default(0);
                        $table->boolean('is_billing_agreed')->default(0);
                        $table->boolean('is_inspected')->default(0);
                        $table->string('inspected_by')->nullable();
                        $table->boolean('is_approved')->default(0);
                        $table->string('approved_by')->nullable();
                        $table->boolean('is_installed')->default(0);
                        $table->string('installed_by')->nullable();
                        $table->timestamps();
                        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ftth_applications');
    }
}
