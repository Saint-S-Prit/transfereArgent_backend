<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226100935 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caissier DROP FOREIGN KEY FK_1F038BC2FC51D1AB');
        $this->addSql('DROP INDEX IDX_1F038BC2FC51D1AB ON caissier');
        $this->addSql('ALTER TABLE caissier DROP admin_systeme_id');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B514973B');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D725330D');
        $this->addSql('DROP INDEX IDX_CFF65260B514973B ON compte');
        $this->addSql('DROP INDEX UNIQ_CFF65260D725330D ON compte');
        $this->addSql('ALTER TABLE compte DROP caissier_id, DROP agence_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caissier ADD admin_systeme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC2FC51D1AB FOREIGN KEY (admin_systeme_id) REFERENCES admin_systeme (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1F038BC2FC51D1AB ON caissier (admin_systeme_id)');
        $this->addSql('ALTER TABLE compte ADD caissier_id INT DEFAULT NULL, ADD agence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B514973B FOREIGN KEY (caissier_id) REFERENCES caissier (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D725330D FOREIGN KEY (agence_id) REFERENCES agence (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CFF65260B514973B ON compte (caissier_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFF65260D725330D ON compte (agence_id)');
    }
}
