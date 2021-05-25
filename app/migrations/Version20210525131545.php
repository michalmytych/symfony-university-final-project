<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525131545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE solution_solution_status (solution_id INT NOT NULL, solution_status_id INT NOT NULL, INDEX IDX_A14F45DD1C0BE183 (solution_id), INDEX IDX_A14F45DDBD0AB3AD (solution_status_id), PRIMARY KEY(solution_id, solution_status_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE solution_solution_status ADD CONSTRAINT FK_A14F45DD1C0BE183 FOREIGN KEY (solution_id) REFERENCES solution (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE solution_solution_status ADD CONSTRAINT FK_A14F45DDBD0AB3AD FOREIGN KEY (solution_status_id) REFERENCES solution_status (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE solution_solution_status');
    }
}
