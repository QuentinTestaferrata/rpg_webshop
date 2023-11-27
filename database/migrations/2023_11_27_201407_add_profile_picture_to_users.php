<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable()->after('birthday');
        });
    }

/*om te reversen
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes made in the 'up' method
            $table->dropColumn('profile_picture');
        });
    }

    */
};
