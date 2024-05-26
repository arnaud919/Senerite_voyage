<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521102724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA1813BD72');
        $this->addSql('DROP INDEX IDX_3EC63EAA1813BD72 ON destination');
        $this->addSql('ALTER TABLE destination CHANGE id_region_id region_id INT NOT NULL');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_3EC63EAA98260155 ON destination (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA98260155');
        $this->addSql('DROP INDEX IDX_3EC63EAA98260155 ON destination');
        $this->addSql('ALTER TABLE destination CHANGE region_id id_region_id INT NOT NULL');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA1813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_3EC63EAA1813BD72 ON destination (id_region_id)');
    }
}
