<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCompanyAndIndivitualFieldsToCauseLogsTable extends Migration
{

    public function up()
    {
        Schema::table('cause_logs', function (Blueprint $table) {
            $table->longText('individual_fields')->nullable();
            $table->longText('company_fields')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cause_logs', function (Blueprint $table) {
            $table->dropColumn('individual_fields');
            $table->dropColumn('company_fields');
        });
    }
}
