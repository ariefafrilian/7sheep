<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->string('gender')->after('last_name');
            $table->date('birth')->after('gender');
            $table->string('city')->nullable()->after('birth');
            $table->text('address')->nullable()->after('city');
            $table->string('photo')->nullable()->after('address');
            $table->string('background')->nullable()->after('photo');
            $table->string('phone')->nullable()->after('background');
            $table->boolean('terms');

            $table->unique('username');
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('gender');
            $table->dropColumn('birth');
            $table->dropColumn('city');
            $table->dropColumn('address');
            $table->dropColumn('photo');
            $table->dropColumn('background');
            $table->dropColumn('phone');
            $table->dropColumn('terms');
        });
    }
}
