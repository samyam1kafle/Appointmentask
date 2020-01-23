<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
            'name'=>'Hospital',
            'description'=>'All the hospital related information\'s are under this department',
            'created_at'=>date("Y-m-d H:i:s")
        );
        DB::table('departments')->insert($departments);
    }
}
