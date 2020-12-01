<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201084246 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE groupetags_tags');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupetags_tags (groupetags_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_DF7976661F76540D (groupetags_id), INDEX IDX_DF7976668D7B4FB4 (tags_id), PRIMARY KEY(groupetags_id, tags_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE groupetags_tags ADD CONSTRAINT FK_DF7976661F76540D FOREIGN KEY (groupetags_id) REFERENCES groupetags (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupetags_tags ADD CONSTRAINT FK_DF7976668D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
