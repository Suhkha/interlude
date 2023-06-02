<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            'name' => 'Clases de carpintería'
        ]);

        DB::table('chats')->insert([
            'name' => 'Venta de ropa'
        ]);

        DB::table('chats')->insert([
            'name' => 'Clases de cocina'
        ]);
    }
}
