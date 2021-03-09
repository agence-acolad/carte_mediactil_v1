<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308125011 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE onglet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nom_en VARCHAR(255) DEFAULT NULL, nom_es VARCHAR(255) DEFAULT NULL, nom_de VARCHAR(255) DEFAULT NULL, nom_it VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onglet_categorie (onglet_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_90659F04BD1A86CC (onglet_id), INDEX IDX_90659F04BCF5E72D (categorie_id), PRIMARY KEY(onglet_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE onglet_categorie ADD CONSTRAINT FK_90659F04BD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE onglet_categorie ADD CONSTRAINT FK_90659F04BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie ADD nom_en VARCHAR(255) DEFAULT NULL, ADD nom_es VARCHAR(255) DEFAULT NULL, ADD nom_de VARCHAR(255) DEFAULT NULL, ADD nom_it VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD nom_en VARCHAR(255) DEFAULT NULL, ADD nom_es VARCHAR(255) DEFAULT NULL, ADD nom_de VARCHAR(255) DEFAULT NULL, ADD nom_it VARCHAR(255) DEFAULT NULL, ADD desc_en LONGTEXT DEFAULT NULL, ADD desc_es LONGTEXT DEFAULT NULL, ADD desc_de LONGTEXT DEFAULT NULL, ADD desc_it LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE onglet_categorie DROP FOREIGN KEY FK_90659F04BD1A86CC');
        $this->addSql('DROP TABLE onglet');
        $this->addSql('DROP TABLE onglet_categorie');
        $this->addSql('ALTER TABLE categorie DROP nom_en, DROP nom_es, DROP nom_de, DROP nom_it');
        $this->addSql('ALTER TABLE produit DROP nom_en, DROP nom_es, DROP nom_de, DROP nom_it, DROP desc_en, DROP desc_es, DROP desc_de, DROP desc_it');
    }
}
