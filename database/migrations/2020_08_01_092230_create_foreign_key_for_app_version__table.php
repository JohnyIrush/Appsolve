<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyForAppVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_version', function (Blueprint $table) {
            $table->foreign('version_id')->references('id')->on('versions')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_version', function (Blueprint $table) {
            $table->dropForeign('app_version_application_id_foreign');
            $table->dropForeign('app_version_version_id_foreign');
        });
    }
}
