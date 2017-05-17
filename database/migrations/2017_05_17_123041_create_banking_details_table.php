<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_name',200);
            $table->string('bank_name',200);
            $table->string('branch_name',150);
            $table->string('branch_code',8);
            $table->string('account_type',20);
            $table->float('amount')->nullable();
            $table->boolean('date_dates')->default(0);
            $table->integer('application_id');
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
        Schema::dropIfExists('banking_details');
    }
}
