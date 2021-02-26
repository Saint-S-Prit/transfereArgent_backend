<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226193613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_agence (id INT NOT NULL, agence_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_3909AB50D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_systeme (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, creat_at DATETIME NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, lattitude DOUBLE PRECISION NOT NULL, lonitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caissier (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, caissier_id INT DEFAULT NULL, agence_id INT DEFAULT NULL, numero_compte VARCHAR(255) NOT NULL, solde INT NOT NULL, creat_at DATETIME NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_CFF65260B514973B (caissier_id), UNIQUE INDEX UNIQ_CFF65260D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, user_agence_id INT DEFAULT NULL, code_transaction VARCHAR(255) NOT NULL, date_depot DATETIME NOT NULL, date_retrait DATETIME NOT NULL, montant INT NOT NULL, frais INT NOT NULL, INDEX IDX_723705D1D7C5BEE9 (user_agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_naiss VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_agence (id INT NOT NULL, agence_id INT DEFAULT NULL, INDEX IDX_1938194D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_agence ADD CONSTRAINT FK_3909AB50D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE admin_agence ADD CONSTRAINT FK_3909AB50BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_systeme ADD CONSTRAINT FK_5145EF6ABF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC2BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B514973B FOREIGN KEY (caissier_id) REFERENCES caissier (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1D7C5BEE9 FOREIGN KEY (user_agence_id) REFERENCES user_agence (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE user_agence ADD CONSTRAINT FK_1938194D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE user_agence ADD CONSTRAINT FK_1938194BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_agence DROP FOREIGN KEY FK_3909AB50D725330D');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D725330D');
        $this->addSql('ALTER TABLE user_agence DROP FOREIGN KEY FK_1938194D725330D');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B514973B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('ALTER TABLE admin_agence DROP FOREIGN KEY FK_3909AB50BF396750');
        $this->addSql('ALTER TABLE admin_systeme DROP FOREIGN KEY FK_5145EF6ABF396750');
        $this->addSql('ALTER TABLE caissier DROP FOREIGN KEY FK_1F038BC2BF396750');
        $this->addSql('ALTER TABLE user_agence DROP FOREIGN KEY FK_1938194BF396750');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1D7C5BEE9');
        $this->addSql('DROP TABLE admin_agence');
        $this->addSql('DROP TABLE admin_systeme');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE caissier');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_agence');
    }
}
