<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddresesAndIdDetailsToApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
    
            $table->string('postal_address')->after('location_id')->nullable();
            $table->string('physical_address')->after('location_id')->nullable();
            $table->string('id_number')->after('location_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('postal_address');
            $table->dropColumn('physical_address');
            $table->dropColumn('id_number');

        });
    }
}
