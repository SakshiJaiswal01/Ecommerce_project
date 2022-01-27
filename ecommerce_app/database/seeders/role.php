<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ["name"=>"super admin"],
            ["name"=>"admin"],
            ["name"=>"inventory manager"],
            ["name"=>"order manager"],
            ["name"=>"customer"],
        ]);
    }
}
