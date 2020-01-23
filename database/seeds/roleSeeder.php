<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = array(
            'name'=>'admin',
            'description'=>'It\'s admin section',
            'created_at'=>date("Y-m-d H:i:s")
        );
        DB::table('roles')->insert($role);
    }
}
