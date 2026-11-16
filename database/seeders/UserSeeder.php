<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = User::firstOrNew(['email' => 'admin@smartdrain.test']);
        $staff->name = 'admin';
        $staff->role = 'admin';
        $staff->password = 'password';
        $staff->save();
        //
        Facility::firstOrCreate(
            ['name' => 'wilayah'],
            ['location' => 'bojongosoang', 'category' => 'banjir', 'condition' => 'lumayan paarh'],
        );
    }
}
