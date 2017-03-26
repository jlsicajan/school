<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = 3;
        $name = [
            'Administradora',
            'Directora',
            'Catedratica'
        ];

        for ($i = 0; $i < $quantity; $i++) {
            DB::table('roles')->insert([
                'name' => $name[$i],
            ]);
        }
    }
}
