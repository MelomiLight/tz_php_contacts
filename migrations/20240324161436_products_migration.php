<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ProductsMigration extends AbstractMigration
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
        $products_table = $this->table('products', ['id' => false, 'primary_key' => ['id']]);

        $products_table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('title', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('price', 'biginteger', ['null' => true])
            ->addColumn('description', 'text', ['null' => true])
            ->addTimestamps()
            ->create();
    }
}
