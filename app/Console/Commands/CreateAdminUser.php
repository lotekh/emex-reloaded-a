<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $first_name = $this->ask('What is your first name?');
        $last_name = $this->ask('What is your last name?');
        $email = $this->ask('What is your email?');
        $password = $this->ask('What is your password?');

        User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'admin',
        ]);
    }
}
