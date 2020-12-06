<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202113949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competences_goupes_de_competences (competences_id INT NOT NULL, goupes_de_competences_id INT NOT NULL, INDEX IDX_6909C109A660B158 (competences_id), INDEX IDX_6909C109E0E60115 (goupes_de_competences_id), PRIMARY KEY(competences_id, goupes_de_competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competences_goupes_de_competences ADD CONSTRAINT FK_6909C109A660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competences_goupes_de_competences ADD CONSTRAINT FK_6909C109E0E60115 FOREIGN KEY (goupes_de_competences_id) REFERENCES goupes_de_competences (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE competences_goupes_de_competences');
    }
}
