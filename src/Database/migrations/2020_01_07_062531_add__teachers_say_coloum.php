<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeachersSayColoum extends Migration
{
    public function up()
    {
        Schema::table('teacher', function($table) {
            $table->string('teachers_say');
            $table->integer('is_homepage');
        });
    }

    public function down()
    {
        Schema::table('teacher', function($table) {
            $table->dropColumn('teachers_say');
            $table->dropColumn('is_homepage')->default(0);;
        });
    }
}
