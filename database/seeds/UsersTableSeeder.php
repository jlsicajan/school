<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Administradora',
            'email' => 'administradora@gmail.com',
            'password' => bcrypt('clave'),
        ]);

        DB::table('users')->insert([
            'name' => 'Directora',
            'email' => 'directora@gmail.com',
            'password' => bcrypt('clave'),
        ]);

        DB::table('users')->insert([
            'name' => 'Catedratica',
            'email' => 'catedratica@gmail.com',
            'password' => bcrypt('clave'),
        ]);
    }
}
