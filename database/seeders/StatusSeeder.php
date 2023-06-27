<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Status::create([
            'name' => 'default',
            'color' => 'white',
        ]);
        Status::create([
            'name' => 'in progress',
            'color' => 'yellow',
        ]);
        Status::create([
            'name' => 'done',
            'color' => 'lightgreen',
        ]);
        Status::create([
            'name' => 'pending',
            'color' => 'lightorange',
        ]);
        Status::create([
            'name' => 'canceled',
            'color' => 'red',
        ]);
        Status::create([
            'name' => 'fav',
            'color' => 'lightpink',
        ]);
        Status::create([
            'name' => 'active',
            'color' => 'lightgreen',
        ]);
        Status::create([
            'name' => 'inactive',
            'color' => 'lightgray',
        ]);
    }
}
