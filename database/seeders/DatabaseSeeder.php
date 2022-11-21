<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'Admin',
            'Regular'
        ];

        foreach($roles as $role){
            $newRole = new \App\Models\Role();
            $newRole->description = $role;
            $newRole->save();
        }
    }
}
