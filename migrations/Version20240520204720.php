<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520204720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accomodation (id INT AUTO_INCREMENT NOT NULL, id_postal_code_id INT NOT NULL, id_type_accomodation_id INT NOT NULL, id_destination_id INT NOT NULL, name_accomodation VARCHAR(255) NOT NULL, description_accomodation LONGTEXT NOT NULL, price_night DOUBLE PRECISION NOT NULL, INDEX IDX_520D81B380DCD767 (id_postal_code_id), INDEX IDX_520D81B36B4354C (id_type_accomodation_id), INDEX IDX_520D81B3BC0ADC46 (id_destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, id_region_id INT NOT NULL, INDEX IDX_3EC63EAA1813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_type (id INT AUTO_INCREMENT NOT NULL, name_person_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_accomodation (id INT AUTO_INCREMENT NOT NULL, id_accomodation_id INT NOT NULL, name_photo_accomodation VARCHAR(255) DEFAULT NULL, INDEX IDX_DD6688A0142E9314 (id_accomodation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postal_code (id INT AUTO_INCREMENT NOT NULL, number_postal_code SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name_region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_accomodation_id INT NOT NULL, total_price_reservation DOUBLE PRECISION NOT NULL, departure_date_reservation DATE NOT NULL, arrival_date_reservation DATE NOT NULL, price_night DOUBLE PRECISION NOT NULL, number_person INT NOT NULL, INDEX IDX_42C8495579F37AE5 (id_user_id), UNIQUE INDEX UNIQ_42C84955142E9314 (id_accomodation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_accomodation (id INT AUTO_INCREMENT NOT NULL, name_accomodation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone_number SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B380DCD767 FOREIGN KEY (id_postal_code_id) REFERENCES postal_code (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B36B4354C FOREIGN KEY (id_type_accomodation_id) REFERENCES type_accomodation (id)');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3BC0ADC46 FOREIGN KEY (id_destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA1813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE photo_accomodation ADD CONSTRAINT FK_DD6688A0142E9314 FOREIGN KEY (id_accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955142E9314 FOREIGN KEY (id_accomodation_id) REFERENCES accomodation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B380DCD767');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B36B4354C');
        $this->addSql('ALTER TABLE accomodation DROP FOREIGN KEY FK_520D81B3BC0ADC46');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA1813BD72');
        $this->addSql('ALTER TABLE photo_accomodation DROP FOREIGN KEY FK_DD6688A0142E9314');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955142E9314');
        $this->addSql('DROP TABLE accomodation');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE person_type');
        $this->addSql('DROP TABLE photo_accomodation');
        $this->addSql('DROP TABLE postal_code');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE type_accomodation');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
