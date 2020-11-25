<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125113219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupetags (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupetags_tags (groupetags_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_DF7976661F76540D (groupetags_id), INDEX IDX_DF7976668D7B4FB4 (tags_id), PRIMARY KEY(groupetags_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupetags_tags ADD CONSTRAINT FK_DF7976661F76540D FOREIGN KEY (groupetags_id) REFERENCES groupetags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupetags_tags ADD CONSTRAINT FK_DF7976668D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupetags_tags DROP FOREIGN KEY FK_DF7976661F76540D');
        $this->addSql('ALTER TABLE groupetags_tags DROP FOREIGN KEY FK_DF7976668D7B4FB4');
        $this->addSql('DROP TABLE groupetags');
        $this->addSql('DROP TABLE groupetags_tags');
        $this->addSql('DROP TABLE tags');
    }
}
