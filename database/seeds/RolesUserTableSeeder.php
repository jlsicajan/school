<?php

use Illuminate\Database\Seeder;

class RolesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = 3;

        $users_id = [1, 2, 3];
        $roles_id = [1, 2, 3];
        for ($i = 0; $i < $quantity; $i++) {
            DB::table('role_users')->insert([
                'user_id' => $users_id[$i],
                'role_id' => $roles_id[$i],
            ]);
        }
    }
}
