<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223104540 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD nom_en VARCHAR(255) DEFAULT NULL, ADD nom_es VARCHAR(255) DEFAULT NULL, ADD nom_de VARCHAR(255) DEFAULT NULL, ADD nom_it VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE onglet ADD nom_en VARCHAR(255) DEFAULT NULL, ADD nom_es VARCHAR(255) DEFAULT NULL, ADD nom_de VARCHAR(255) DEFAULT NULL, ADD nom_it VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD nom_english VARCHAR(255) DEFAULT NULL, ADD nom_spanish VARCHAR(255) DEFAULT NULL, ADD nom_en VARCHAR(255) DEFAULT NULL, ADD nom_es VARCHAR(255) DEFAULT NULL, ADD nom_de VARCHAR(255) DEFAULT NULL, ADD nom_it VARCHAR(255) DEFAULT NULL, ADD desc_en LONGTEXT DEFAULT NULL, ADD desc_es LONGTEXT DEFAULT NULL, ADD desc_de LONGTEXT DEFAULT NULL, ADD desc_it LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP nom_en, DROP nom_es, DROP nom_de, DROP nom_it');
        $this->addSql('ALTER TABLE onglet DROP nom_en, DROP nom_es, DROP nom_de, DROP nom_it');
        $this->addSql('ALTER TABLE produit DROP nom_english, DROP nom_spanish, DROP nom_en, DROP nom_es, DROP nom_de, DROP nom_it, DROP desc_en, DROP desc_es, DROP desc_de, DROP desc_it');
    }
}
