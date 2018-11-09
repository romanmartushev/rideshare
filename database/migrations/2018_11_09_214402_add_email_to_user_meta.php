<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailToUserMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_meta')) {
            Schema::table('user_meta', function (Blueprint $table) {
                $table->string('email')->default('')->after('name');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('user_meta')) {
            Schema::table('user_meta', function (Blueprint $table) {
                if (Schema::hasColumn('user_meta', 'email')) {
                    $table->dropColumn('email');
                }
            });
        }
    }
}
