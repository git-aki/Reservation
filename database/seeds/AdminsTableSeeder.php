<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->delete();

      DB::table('admins')->insert([
             [
                  'name'      => '管理者',
                  'username'  => 'admin',
                  'email'     => '9e4815a21a-19cbd2@inbox.mailtrap.io',
                  'email_verified_at' => date('Y-m-d H:i:s'),

                  'password' => Hash::make('secret'),

                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s') 
               ]
          ]);
    }
}