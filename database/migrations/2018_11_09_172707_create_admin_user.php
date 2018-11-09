<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = \App\User::create([
            'name' => getenv('WP_USERNAME'),
            'email' => 'admin@rideshare.com',
            'password' => Hash::make(getenv('WP_PASSWORD')),
        ]);
        \App\UserMeta::create([
            'user_id' => $user->id,
            'name' => $user->name,
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
        $user = \App\User::where('email','admin@rideshare.com')->first();
        \App\UserMeta::where('user_id', $user->id)->delete();
        $user->delete();
    }
}
