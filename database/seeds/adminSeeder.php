<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            array(
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=>bcrypt('admin123'),
                'role_id'=>'1',
                'department_id'=>'1',
                'created_at'=> date("Y-m-d H:i:s"),
            )
        );

        DB::table('all__users')->insert($admin);
    }
}
