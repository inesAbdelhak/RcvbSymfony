<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128120851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrainement_terrain (entrainement_id INT NOT NULL, terrain_id INT NOT NULL, INDEX IDX_5D1E4B82A15E8FD (entrainement_id), INDEX IDX_5D1E4B828A2D8B41 (terrain_id), PRIMARY KEY(entrainement_id, terrain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B82A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B828A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B82A15E8FD');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B828A2D8B41');
        $this->addSql('DROP TABLE entrainement_terrain');
    }
}
