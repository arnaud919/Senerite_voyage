<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521104603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955142E9314');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('DROP INDEX IDX_42C8495579F37AE5 ON reservation');
        $this->addSql('DROP INDEX UNIQ_42C84955142E9314 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD user_id INT NOT NULL, ADD accomodation_id INT NOT NULL, DROP id_user_id, DROP id_accomodation_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FD70509C FOREIGN KEY (accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('CREATE INDEX IDX_42C84955A76ED395 ON reservation (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955FD70509C ON reservation (accomodation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FD70509C');
        $this->addSql('DROP INDEX IDX_42C84955A76ED395 ON reservation');
        $this->addSql('DROP INDEX UNIQ_42C84955FD70509C ON reservation');
        $this->addSql('ALTER TABLE reservation ADD id_user_id INT NOT NULL, ADD id_accomodation_id INT NOT NULL, DROP user_id, DROP accomodation_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955142E9314 FOREIGN KEY (id_accomodation_id) REFERENCES accomodation (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C8495579F37AE5 ON reservation (id_user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955142E9314 ON reservation (id_accomodation_id)');
    }
}
