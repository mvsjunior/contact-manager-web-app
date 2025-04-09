<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $contacts = [
            [
                "name" => "Trevor Belmont",
                "contact" => "559922448",
                "email" => "trevor@alfatest.app"
            ],
            [
                "name" => "Justin Belmont",
                "contact" => "553222455",
                "email" => "justin.belmont@alfatest.app"
            ],
            [
                "name" => "Helena Silva",
                "contact" => null,
                "email" => null
            ]
        ];

        DB::table('contacts')->insert($contacts);
    }
}
