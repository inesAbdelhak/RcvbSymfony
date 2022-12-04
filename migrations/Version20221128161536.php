<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128161536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD category_adherent_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634926B2E38 FOREIGN KEY (category_adherent_id) REFERENCES category_adherent (id)');
        $this->addSql('CREATE INDEX IDX_497DD634926B2E38 ON categorie (category_adherent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634926B2E38');
        $this->addSql('DROP INDEX IDX_497DD634926B2E38 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP category_adherent_id');
    }
}
