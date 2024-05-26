<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521092729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_person_type (reservation_id INT NOT NULL, person_type_id INT NOT NULL, INDEX IDX_CA540E5EB83297E7 (reservation_id), INDEX IDX_CA540E5EE7D23F1A (person_type_id), PRIMARY KEY(reservation_id, person_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_person_type ADD CONSTRAINT FK_CA540E5EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_person_type ADD CONSTRAINT FK_CA540E5EE7D23F1A FOREIGN KEY (person_type_id) REFERENCES person_type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_person_type DROP FOREIGN KEY FK_CA540E5EB83297E7');
        $this->addSql('ALTER TABLE reservation_person_type DROP FOREIGN KEY FK_CA540E5EE7D23F1A');
        $this->addSql('DROP TABLE reservation_person_type');
    }
}
