<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyNewMigration extends AbstractMigration
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
        $table = $this->table('comments', ['id' => false, 'primary_key' => ['id']]);
    
        $table->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
              ->addColumn('product_id', 'integer', ['null' => true])
              ->addColumn('body', 'text', ['null' => true])
              ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'NO ACTION'])
              ->create();
    }

}
