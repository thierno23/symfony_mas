<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203144059 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brief (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contexte VARCHAR(255) NOT NULL, livrable_attendus VARCHAR(255) NOT NULL, modalites_pedagogiques VARCHAR(255) NOT NULL, critere_de_performance VARCHAR(255) NOT NULL, modalites_evaluation VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, date_creation VARCHAR(255) NOT NULL, etat_brouillon_assigner_archiver VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiels_groupes_de_competences (referentiels_id INT NOT NULL, groupes_de_competences_id INT NOT NULL, INDEX IDX_45F1E25CB8F4689C (referentiels_id), INDEX IDX_45F1E25CF8F36872 (groupes_de_competences_id), PRIMARY KEY(referentiels_id, groupes_de_competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiels_brief (referentiels_id INT NOT NULL, brief_id INT NOT NULL, INDEX IDX_E543DDE6B8F4689C (referentiels_id), INDEX IDX_E543DDE6757FABFF (brief_id), PRIMARY KEY(referentiels_id, brief_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE referentiels_groupes_de_competences ADD CONSTRAINT FK_45F1E25CB8F4689C FOREIGN KEY (referentiels_id) REFERENCES referentiels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiels_groupes_de_competences ADD CONSTRAINT FK_45F1E25CF8F36872 FOREIGN KEY (groupes_de_competences_id) REFERENCES groupes_de_competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiels_brief ADD CONSTRAINT FK_E543DDE6B8F4689C FOREIGN KEY (referentiels_id) REFERENCES referentiels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiels_brief ADD CONSTRAINT FK_E543DDE6757FABFF FOREIGN KEY (brief_id) REFERENCES brief (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competences_groupes_de_competences RENAME INDEX idx_6909c109a660b158 TO IDX_921877E4A660B158');
        $this->addSql('ALTER TABLE competences_groupes_de_competences RENAME INDEX idx_6909c109e0e60115 TO IDX_921877E4F8F36872');
        $this->addSql('ALTER TABLE referentiels ADD promo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE referentiels ADD CONSTRAINT FK_590B3B47D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('CREATE INDEX IDX_590B3B47D0C07AFF ON referentiels (promo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE referentiels_brief DROP FOREIGN KEY FK_E543DDE6757FABFF');
        $this->addSql('ALTER TABLE referentiels DROP FOREIGN KEY FK_590B3B47D0C07AFF');
        $this->addSql('DROP TABLE brief');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE referentiels_groupes_de_competences');
        $this->addSql('DROP TABLE referentiels_brief');
        $this->addSql('ALTER TABLE competences_groupes_de_competences RENAME INDEX idx_921877e4a660b158 TO IDX_6909C109A660B158');
        $this->addSql('ALTER TABLE competences_groupes_de_competences RENAME INDEX idx_921877e4f8f36872 TO IDX_6909C109E0E60115');
        $this->addSql('DROP INDEX IDX_590B3B47D0C07AFF ON referentiels');
        $this->addSql('ALTER TABLE referentiels DROP promo_id');
    }
}
