<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226104215 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_agence ADD agence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_agence ADD CONSTRAINT FK_1938194D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_1938194D725330D ON user_agence (agence_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_agence DROP FOREIGN KEY FK_1938194D725330D');
        $this->addSql('DROP INDEX IDX_1938194D725330D ON user_agence');
        $this->addSql('ALTER TABLE user_agence DROP agence_id');
    }
}
