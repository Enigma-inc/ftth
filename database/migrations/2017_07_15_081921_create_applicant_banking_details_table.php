<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantBankingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_banking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name',200);
            $table->string('branch_name',150);
            $table->string('branch_code',10);
            $table->string('account_name',200);
            $table->string('account_type',20);
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
        Schema::dropIfExists('applicant_banking_details');
    }
}
