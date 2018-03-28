<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'role_id'     => 1,
        ]);

        DB::table('users')->insert([
            'name'     => 'Editor',
            'email'    => 'editor@editor.com',
            'password' => bcrypt('secret'),
            'role_id'     => 2,
        ]);

        DB::table('users')->insert([
            'name'     => 'User',
            'email'    => 'user@user.com',
            'password' => bcrypt('secret'),
            'role_id'     => 3,
        ]);
    }
}
