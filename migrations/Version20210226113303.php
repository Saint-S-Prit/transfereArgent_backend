<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226113303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29767B3B43D');
        $this->addSql('DROP INDEX IDX_E6D6B29767B3B43D ON profil');
        $this->addSql('ALTER TABLE profil CHANGE users_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B297A76ED395 ON profil (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A76ED395');
        $this->addSql('DROP INDEX IDX_E6D6B297A76ED395 ON profil');
        $this->addSql('ALTER TABLE profil CHANGE user_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29767B3B43D FOREIGN KEY (users_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E6D6B29767B3B43D ON profil (users_id)');
    }
}
