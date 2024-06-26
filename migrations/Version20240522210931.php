<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522210931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX name_destination ON destination');
        $this->addSql('ALTER TABLE destination CHANGE name_destination name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE phone_number phone_number INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination CHANGE name name_destination VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX name_destination ON destination (name_destination)');
        $this->addSql('ALTER TABLE `user` CHANGE phone_number phone_number SMALLINT DEFAULT NULL');
    }
}
