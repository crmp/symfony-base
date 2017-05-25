<?php

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

class Version1_0_0 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addressUp($schema);
        $this->accessKeyUp($schema);
    }

    protected function addressUp(Schema $schema)
    {
        $table = $schema->createTable(self::TABLE_ADDRESS);

        $table->addColumn('uuid', Type::STRING);
        $table->addColumn('name', Type::STRING)->setNotnull(true);
        $table->addColumn('enabled', Type::BOOLEAN)->setDefault(true);

        $table->addColumn('email', Type::STRING)->setNotnull(false);
        $table->addUniqueIndex(['email']);

        // Nested set
        $table->addColumn('lft', Type::INTEGER)->setUnsigned(true);
        $table->addColumn('rgt', Type::INTEGER)->setUnsigned(true);
        $table->addColumn('lvl', Type::INTEGER)->setUnsigned(true);

        $table->addColumn('root', Type::STRING)->setNotnull(false);
        $table->addForeignKeyConstraint(static::TABLE_ADDRESS, ['root'], ['uuid'], ['onDelete' => 'SET NULL']);

        $table->addColumn('parent', Type::STRING)->setNotnull(false);
        $table->addForeignKeyConstraint(static::TABLE_ADDRESS, ['parent'], ['uuid'], ['onDelete' => 'RESTRICT']);

        $table->setPrimaryKey(['uuid']);
    }

    public function down(Schema $schema)
    {
        $this->addressDown($schema);
        $this->accessKeyDown($schema);
    }

    protected function addressDown(Schema $schema)
    {
        $schema->dropTable(static::TABLE_ADDRESS);
    }

    protected function accessKeyUp(Schema $schema)
    {
        $table = $schema->createTable(static::TABLE_ACCESS_KEY);

        $table->addColumn('uuid', Type::STRING);
        $table->addColumn('public_key', Type::STRING)->setNotnull(false)->setDefault(null);
        $table->addColumn('private_key', Type::STRING)->setNotnull(false)->setDefault(null);
        $table->addColumn('address', Type::STRING);
    }

    protected function accessKeyDown(Schema $schema)
    {
        $schema->dropTable(static::TABLE_ACCESS_KEY);
    }
}
