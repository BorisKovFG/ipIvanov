<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class StartFertilizersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:fertilizers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start project fertilizers and add email for IP Ivanov for authorisation';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $dataRole = [
            'name' => 'Admin'
        ];
        Role::create($dataRole);

        $userIpIvanov = [
            'name' => 'IP Ivanov',
            'email' => 'start@poop.test',
            'password' => Hash::make('ipivanovthebest'),
            'role_id' => 1
        ];
        User::firstOrCreate($userIpIvanov);
    }
}
