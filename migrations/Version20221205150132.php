<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205150132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634926B2E38');
        $this->addSql('CREATE TABLE categorie_adherent (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, adherent_id INT DEFAULT NULL, INDEX IDX_A854B10ABCF5E72D (categorie_id), INDEX IDX_A854B10A25F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10A25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE category_adherent DROP FOREIGN KEY FK_27A9741B25F06C53');
        $this->addSql('DROP TABLE category_adherent');
        $this->addSql('DROP INDEX IDX_497DD634926B2E38 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP category_adherent_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_adherent (id INT AUTO_INCREMENT NOT NULL, adherent_id INT DEFAULT NULL, annee INT NOT NULL, INDEX IDX_27A9741B25F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_adherent ADD CONSTRAINT FK_27A9741B25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10ABCF5E72D');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10A25F06C53');
        $this->addSql('DROP TABLE categorie_adherent');
        $this->addSql('ALTER TABLE categorie ADD category_adherent_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634926B2E38 FOREIGN KEY (category_adherent_id) REFERENCES category_adherent (id)');
        $this->addSql('CREATE INDEX IDX_497DD634926B2E38 ON categorie (category_adherent_id)');
    }
}
