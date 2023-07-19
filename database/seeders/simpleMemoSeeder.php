<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class simpleMemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('simpleMemos')->insert([
            'content' => Str::random(10),
            'user_id' => 1,
            'created_at' => date("y-m-d"),
            'updated_at' => date("y-m-d")
        ]);
    }
}
