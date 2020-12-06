<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203150255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promo ADD referentiels_id INT DEFAULT NULL, ADD choix_langue VARCHAR(255) NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD description_promo VARCHAR(255) NOT NULL, ADD lieu_promo VARCHAR(255) NOT NULL, ADD reference_agate VARCHAR(255) NOT NULL, ADD choix_de_fabrique VARCHAR(255) NOT NULL, ADD date_debut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE promo ADD CONSTRAINT FK_B0139AFBB8F4689C FOREIGN KEY (referentiels_id) REFERENCES referentiels (id)');
        $this->addSql('CREATE INDEX IDX_B0139AFBB8F4689C ON promo (referentiels_id)');
        $this->addSql('ALTER TABLE referentiels DROP FOREIGN KEY FK_590B3B47D0C07AFF');
        $this->addSql('DROP INDEX IDX_590B3B47D0C07AFF ON referentiels');
        $this->addSql('ALTER TABLE referentiels DROP promo_id, DROP libelle');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promo DROP FOREIGN KEY FK_B0139AFBB8F4689C');
        $this->addSql('DROP INDEX IDX_B0139AFBB8F4689C ON promo');
        $this->addSql('ALTER TABLE promo DROP referentiels_id, DROP choix_langue, DROP titre, DROP description_promo, DROP lieu_promo, DROP reference_agate, DROP choix_de_fabrique, DROP date_debut');
        $this->addSql('ALTER TABLE referentiels ADD promo_id INT DEFAULT NULL, ADD libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE referentiels ADD CONSTRAINT FK_590B3B47D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_590B3B47D0C07AFF ON referentiels (promo_id)');
    }
}
