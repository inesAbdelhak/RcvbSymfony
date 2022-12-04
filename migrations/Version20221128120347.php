<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128120347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrainement_categorie (entrainement_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AE7ABE3AA15E8FD (entrainement_id), INDEX IDX_AE7ABE3ABCF5E72D (categorie_id), PRIMARY KEY(entrainement_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3AA15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3AA15E8FD');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3ABCF5E72D');
        $this->addSql('DROP TABLE entrainement_categorie');
    }
}
