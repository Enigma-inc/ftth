<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeleteColumnToPackagesLookup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages_lookup', function (Blueprint $table) {
            $table->softDeletes()
                ->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('packages_lookup', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
        });
    }
}
