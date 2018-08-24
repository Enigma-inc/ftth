<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructureApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'applicant_personal_info_id')) {

                $table->dropColumn('applicant_personal_info_id');
            }
            if (Schema::hasColumn('applications', 'applicant_banking_details_id')) {

                $table->dropColumn('applicant_banking_details_id');
            }
        

            // $table->dropColumn('applicant_banking_details_id');
            $table->dropColumn('amount');

            //Add New columns
            $table->string('name', 150);
            $table->string('surname', 150);
            $table->string('email', 200);
            $table->string('phone', 150)->nullable();

            //modify Columns
            $table->unsignedInteger('user_id')->nullable()->change();

            if (!Schema::hasColumn('applications', 'location_id')) {

                $table->unsignedInteger('location_id');
            }

        });

        //remove tables
        // Schema::drop('applicant_banking_details');
        Schema::dropIfExists('applicant_personal_details');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
