<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('resume_id');
            $table->string('name');
            $table->string('location');
            $table->boolean('highschool')->default(false);
            $table->string('hs_name')->nullable();
            $table->boolean('undergrad')->default(false);
            $table->string('ug_name')->nullable();
            $table->boolean('graduate')->default(false);
            $table->string('g_name')->nullable();
            $table->boolean('phd')->default(false);
            $table->string('phd_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
