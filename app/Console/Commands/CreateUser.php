<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * O nome e a assinatura do comando console.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * A descrição do comando console.
     *
     * @var string
     */
    protected $description = 'Cria um novo usuário no sistema com o nome, email e senha fornecidos';

    /**
     * Execute o comando console.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the name?');
        $email = $this->ask('What is the email?');
        $password = $this->ask('What is the password?');

        if (User::where('email', $email)->exists()) {
            $this->error('The email is already registered.');
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if ($user) {
            $this->info('User created with success!');
            return 0;
        } else {
            $this->error('Fail while trying create user.');
            return 1;
        }
    }
}
