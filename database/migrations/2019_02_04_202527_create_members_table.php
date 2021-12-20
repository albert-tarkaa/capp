<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->string('surname', 100);
            $table->string('firstname', 100);
            $table->string('middlename', 100)->nullable();
            $table->date('DOB');
            $table->string('email', 100)->unique();
            $table->string('phone', 100);
            $table->mediumText('contactAddress', 100);
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
        Schema::dropIfExists('members');
    }
}
