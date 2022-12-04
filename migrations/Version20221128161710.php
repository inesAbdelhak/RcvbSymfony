<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128161710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_adherent ADD adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_adherent ADD CONSTRAINT FK_27A9741B25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('CREATE INDEX IDX_27A9741B25F06C53 ON category_adherent (adherent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_adherent DROP FOREIGN KEY FK_27A9741B25F06C53');
        $this->addSql('DROP INDEX IDX_27A9741B25F06C53 ON category_adherent');
        $this->addSql('ALTER TABLE category_adherent DROP adherent_id');
    }
}
