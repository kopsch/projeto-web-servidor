<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);

        $table
        ->addColumn('id', 'string', ['limit' => 36, 'null' => false])
        ->addColumn('username', 'string', ['limit' => 40, 'null' => false])
        ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
        ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
        ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
        ->addTimestamps()
        ->addIndex(['username', 'email', 'id'], ['unique' => true])
        ->create();
    }
}
