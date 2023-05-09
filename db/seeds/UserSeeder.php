<?php

use Phinx\Seed\AbstractSeed;
use Ramsey\Uuid\Uuid;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'kopsch',
                'name' => 'Pedro Kopsch',
                'email' => 'pedro@teste.com',
                'password' => password_hash($_ENV['LOCAL_PASSWORD'], PASSWORD_BCRYPT)
            ]
        ];

        $users = $this->table('users');
        $users->insert($data)->saveData();
    }
}
