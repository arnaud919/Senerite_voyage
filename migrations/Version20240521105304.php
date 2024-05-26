<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521105304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3BC0ADC46');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B36B4354C');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B380DCD767');
        $this->addSql('DROP INDEX IDX_520D81B3BC0ADC46 ON accomodation');
        $this->addSql('DROP INDEX IDX_520D81B380DCD767 ON accomodation');
        $this->addSql('DROP INDEX IDX_520D81B36B4354C ON accomodation');
        $this->addSql('ALTER TABLE accomodation ADD postal_code_id INT NOT NULL, ADD type_accomodation_id INT NOT NULL, ADD destination_id INT NOT NULL, DROP id_postal_code_id, DROP id_type_accomodation_id, DROP id_destination_id');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3BDBA6A61 FOREIGN KEY (postal_code_id) REFERENCES postal_code (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3A44C4E8 FOREIGN KEY (type_accomodation_id) REFERENCES type_accomodation (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_520D81B3BDBA6A61 ON accomodation (postal_code_id)');
        $this->addSql('CREATE INDEX IDX_520D81B3A44C4E8 ON accomodation (type_accomodation_id)');
        $this->addSql('CREATE INDEX IDX_520D81B3816C6140 ON accomodation (destination_id)');
        $this->addSql('ALTER TABLE photo_accomodation DROP FOREIGN KEY FK_DD6688A0142E9314');
        $this->addSql('DROP INDEX IDX_DD6688A0142E9314 ON photo_accomodation');
        $this->addSql('ALTER TABLE photo_accomodation CHANGE id_accomodation_id accomodation_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo_accomodation ADD CONSTRAINT FK_DD6688A0FD70509C FOREIGN KEY (accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('CREATE INDEX IDX_DD6688A0FD70509C ON photo_accomodation (accomodation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3BDBA6A61');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3A44C4E8');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3816C6140');
        $this->addSql('DROP INDEX IDX_520D81B3BDBA6A61 ON accomodation');
        $this->addSql('DROP INDEX IDX_520D81B3A44C4E8 ON accomodation');
        $this->addSql('DROP INDEX IDX_520D81B3816C6140 ON accomodation');
        $this->addSql('ALTER TABLE accomodation ADD id_postal_code_id INT NOT NULL, ADD id_type_accomodation_id INT NOT NULL, ADD id_destination_id INT NOT NULL, DROP postal_code_id, DROP type_accomodation_id, DROP destination_id');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3BC0ADC46 FOREIGN KEY (id_destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B36B4354C FOREIGN KEY (id_type_accomodation_id) REFERENCES type_accomodation (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B380DCD767 FOREIGN KEY (id_postal_code_id) REFERENCES postal_code (id)');
        $this->addSql('CREATE INDEX IDX_520D81B3BC0ADC46 ON accomodation (id_destination_id)');
        $this->addSql('CREATE INDEX IDX_520D81B380DCD767 ON accomodation (id_postal_code_id)');
        $this->addSql('CREATE INDEX IDX_520D81B36B4354C ON accomodation (id_type_accomodation_id)');
        $this->addSql('ALTER TABLE photo_accomodation DROP FOREIGN KEY FK_DD6688A0FD70509C');
        $this->addSql('DROP INDEX IDX_DD6688A0FD70509C ON photo_accomodation');
        $this->addSql('ALTER TABLE photo_accomodation CHANGE accomodation_id id_accomodation_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo_accomodation ADD CONSTRAINT FK_DD6688A0142E9314 FOREIGN KEY (id_accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('CREATE INDEX IDX_DD6688A0142E9314 ON photo_accomodation (id_accomodation_id)');
    }
}
