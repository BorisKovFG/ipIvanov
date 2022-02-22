<?php

namespace Database\Seeders;

use App\Models\CultureGroup;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CultureGroup::factory(5)->create();

        $dataRole = [
            'name' => 'Admin'
        ];
        Role::firstOrCreate($dataRole);

        $userAdminData = [
            'name' => 'MR Ivanov',
            'email' => 'info@poop.test',
            'email_verified_at' => now(),
            'password' => '$2y$10$p1DIugOPPCS5ZnnTdQb4RuQ3kJFIWmKCyJCLS5RsQFIkcXNfv05Ja', // password
            'remember_token' => Str::random(10),
            'role_id' => Role::get()->where('name', 'Admin')->first()->id
        ];
        User::firstOrCreate($userAdminData);

        // \App\Models\User::factory(10)->create();
    }
}
