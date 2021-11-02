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
        $id = DB::table('opds')->insert([
            'nama' => 'opd admin'
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'roles' => 'admin'/*json_encode(['ADMIN'])*/,
            'status' => 'ACTIVE',
            'opd_id' => $id
        ]);
    }
}