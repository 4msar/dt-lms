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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('mobile_number')->nullable();
            $table->string('facebook_profile_id')->nullable();
            $table->string('linkedin_profile_id')->nullable();
            $table->string('google_profile_id')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->string('designation')->nullable();
            $table->string('work_at')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('role')->default('user');
            
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Saiful Alam',
            'email' => 'msa_rakib@outlook.com',
            'username' => 'msa_rakib',
            'password' => bcrypt('Akash20'),
            'email_verified_at' => now(),
            'role' => 'admin'
        ]);
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
