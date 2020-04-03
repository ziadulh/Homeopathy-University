<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo');
            $table->string('serial_no')->nullable();
            $table->string('name');
            $table->integer('nid');

            $table->tinyInteger('dhms_stdn')->nullable();
            $table->tinyInteger('bhms_stdn')->nullable();
            $table->string('other_stdn')->nullable();
            $table->string('session_stdn')->nullable();
            $table->tinyInteger('dhms_dctr')->nullable();
            $table->tinyInteger('bhms_dctr')->nullable();
            $table->string('other_dctr')->nullable();
            $table->string('regNo_dctr')->nullable();
            $table->string('npp');
            $table->string('institute');

            $table->text('address');
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('phone');
            $table->string('signature');

            $table->string('payment');

            $table->enum('user_type',['ADMIN','GENERAL'])->default('GENERAL');
            $table->tinyInteger('publish')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
