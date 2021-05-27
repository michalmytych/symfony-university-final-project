<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527082950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE code_languages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, jdoodle_code VARCHAR(16) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_group (course_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_846B432D591CC992 (course_id), INDEX IDX_846B432DFE54D947 (group_id), PRIMARY KEY(course_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_post (course_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_9228B18B591CC992 (course_id), INDEX IDX_9228B18B4B89032C (post_id), PRIMARY KEY(course_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grades (id INT AUTO_INCREMENT NOT NULL, comment VARCHAR(128) DEFAULT NULL, final_score NUMERIC(3, 2) DEFAULT NULL, created_at DATETIME DEFAULT NULL, auto_score NUMERIC(3, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `groups` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_post (group_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_73D037FDFE54D947 (group_id), INDEX IDX_73D037FD4B89032C (post_id), PRIMARY KEY(group_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, text_content VARCHAR(512) NOT NULL, created_at DATETIME NOT NULL, title VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE problems (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, description LONGTEXT NOT NULL, tests JSON NOT NULL, title VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE problem_code_language (problem_id INT NOT NULL, code_language_id INT NOT NULL, INDEX IDX_EEAD558DA0DCED86 (problem_id), INDEX IDX_EEAD558DCBB05344 (code_language_id), PRIMARY KEY(problem_id, code_language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE problem_group (problem_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_F5C86B6EA0DCED86 (problem_id), INDEX IDX_F5C86B6EFE54D947 (group_id), PRIMARY KEY(problem_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution_statuses (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solutions (id INT AUTO_INCREMENT NOT NULL, problem_id INT DEFAULT NULL, grade_id INT DEFAULT NULL, code_language_id INT NOT NULL, status_id INT NOT NULL, submitted_at DATETIME NOT NULL, INDEX IDX_A90F77EA0DCED86 (problem_id), UNIQUE INDEX UNIQ_A90F77EFE19A1A8 (grade_id), INDEX IDX_A90F77ECBB05344 (code_language_id), INDEX IDX_A90F77E6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution_solution_status (solution_id INT NOT NULL, solution_status_id INT NOT NULL, INDEX IDX_A14F45DD1C0BE183 (solution_id), INDEX IDX_A14F45DDBD0AB3AD (solution_status_id), PRIMARY KEY(solution_id, solution_status_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wow (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_group ADD CONSTRAINT FK_846B432D591CC992 FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_group ADD CONSTRAINT FK_846B432DFE54D947 FOREIGN KEY (group_id) REFERENCES `groups` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_post ADD CONSTRAINT FK_9228B18B591CC992 FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_post ADD CONSTRAINT FK_9228B18B4B89032C FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_post ADD CONSTRAINT FK_73D037FDFE54D947 FOREIGN KEY (group_id) REFERENCES `groups` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_post ADD CONSTRAINT FK_73D037FD4B89032C FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem_code_language ADD CONSTRAINT FK_EEAD558DA0DCED86 FOREIGN KEY (problem_id) REFERENCES problems (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem_code_language ADD CONSTRAINT FK_EEAD558DCBB05344 FOREIGN KEY (code_language_id) REFERENCES code_languages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem_group ADD CONSTRAINT FK_F5C86B6EA0DCED86 FOREIGN KEY (problem_id) REFERENCES problems (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem_group ADD CONSTRAINT FK_F5C86B6EFE54D947 FOREIGN KEY (group_id) REFERENCES `groups` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE solutions ADD CONSTRAINT FK_A90F77EA0DCED86 FOREIGN KEY (problem_id) REFERENCES problems (id)');
        $this->addSql('ALTER TABLE solutions ADD CONSTRAINT FK_A90F77EFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grades (id)');
        $this->addSql('ALTER TABLE solutions ADD CONSTRAINT FK_A90F77ECBB05344 FOREIGN KEY (code_language_id) REFERENCES code_languages (id)');
        $this->addSql('ALTER TABLE solutions ADD CONSTRAINT FK_A90F77E6BF700BD FOREIGN KEY (status_id) REFERENCES solution_statuses (id)');
        $this->addSql('ALTER TABLE solution_solution_status ADD CONSTRAINT FK_A14F45DD1C0BE183 FOREIGN KEY (solution_id) REFERENCES solutions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE solution_solution_status ADD CONSTRAINT FK_A14F45DDBD0AB3AD FOREIGN KEY (solution_status_id) REFERENCES solution_statuses (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE problem_code_language DROP FOREIGN KEY FK_EEAD558DCBB05344');
        $this->addSql('ALTER TABLE solutions DROP FOREIGN KEY FK_A90F77ECBB05344');
        $this->addSql('ALTER TABLE course_group DROP FOREIGN KEY FK_846B432D591CC992');
        $this->addSql('ALTER TABLE course_post DROP FOREIGN KEY FK_9228B18B591CC992');
        $this->addSql('ALTER TABLE solutions DROP FOREIGN KEY FK_A90F77EFE19A1A8');
        $this->addSql('ALTER TABLE course_group DROP FOREIGN KEY FK_846B432DFE54D947');
        $this->addSql('ALTER TABLE group_post DROP FOREIGN KEY FK_73D037FDFE54D947');
        $this->addSql('ALTER TABLE problem_group DROP FOREIGN KEY FK_F5C86B6EFE54D947');
        $this->addSql('ALTER TABLE course_post DROP FOREIGN KEY FK_9228B18B4B89032C');
        $this->addSql('ALTER TABLE group_post DROP FOREIGN KEY FK_73D037FD4B89032C');
        $this->addSql('ALTER TABLE problem_code_language DROP FOREIGN KEY FK_EEAD558DA0DCED86');
        $this->addSql('ALTER TABLE problem_group DROP FOREIGN KEY FK_F5C86B6EA0DCED86');
        $this->addSql('ALTER TABLE solutions DROP FOREIGN KEY FK_A90F77EA0DCED86');
        $this->addSql('ALTER TABLE solutions DROP FOREIGN KEY FK_A90F77E6BF700BD');
        $this->addSql('ALTER TABLE solution_solution_status DROP FOREIGN KEY FK_A14F45DDBD0AB3AD');
        $this->addSql('ALTER TABLE solution_solution_status DROP FOREIGN KEY FK_A14F45DD1C0BE183');
        $this->addSql('DROP TABLE code_languages');
        $this->addSql('DROP TABLE courses');
        $this->addSql('DROP TABLE course_group');
        $this->addSql('DROP TABLE course_post');
        $this->addSql('DROP TABLE grades');
        $this->addSql('DROP TABLE `groups`');
        $this->addSql('DROP TABLE group_post');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE problems');
        $this->addSql('DROP TABLE problem_code_language');
        $this->addSql('DROP TABLE problem_group');
        $this->addSql('DROP TABLE solution_statuses');
        $this->addSql('DROP TABLE solutions');
        $this->addSql('DROP TABLE solution_solution_status');
        $this->addSql('DROP TABLE wow');
    }
}
