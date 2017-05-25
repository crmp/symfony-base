<?php


namespace App\DoctrineMigrations;


abstract class AbstractMigration extends \Doctrine\DBAL\Migrations\AbstractMigration
{
    const TABLE_ADDRESS = 'address';

    const TABLE_ACCESS_KEY = 'address_key';
}
