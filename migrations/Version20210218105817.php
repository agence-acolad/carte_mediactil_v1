<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218105817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE onglet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onglet_categorie (onglet_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_90659F04BD1A86CC (onglet_id), INDEX IDX_90659F04BCF5E72D (categorie_id), PRIMARY KEY(onglet_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE onglet_categorie ADD CONSTRAINT FK_90659F04BD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE onglet_categorie ADD CONSTRAINT FK_90659F04BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE onglet_categorie DROP FOREIGN KEY FK_90659F04BD1A86CC');
        $this->addSql('DROP TABLE onglet');
        $this->addSql('DROP TABLE onglet_categorie');
    }
}
