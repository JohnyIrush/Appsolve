<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyForVersionServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('version_service', function (Blueprint $table) {
            $table->foreign('version_id')->references('id')->on('versions')->onDelete('cascade');
            $table->foreign('appservice_id')->references('id')->on('appservices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('version_service', function (Blueprint $table) {
            $table->dropForeign('version_service_appservice_id_foreign');
            $table->dropForeign('version_service_version_id_foreign');
        });
    }    

}
