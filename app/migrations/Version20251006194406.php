<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251006194406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE exercise_attribute_definition (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, unit VARCHAR(255) NOT NULL, data_type VARCHAR(255) NOT NULL, exercise_id INT NOT NULL, INDEX IDX_6B737A97E934951A (exercise_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE program (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE program_training_link (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, order_in_program INT NOT NULL, program_id INT NOT NULL, training_id INT DEFAULT NULL, INDEX IDX_9C7FCE2A3EB8070A (program_id), INDEX IDX_9C7FCE2ABEFD98D1 (training_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) DEFAULT NULL, category_id INT NOT NULL, INDEX IDX_D5128A8F12469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE training_category (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE training_exercise_link (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, order_in_training INT NOT NULL, training_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_112094D2BEFD98D1 (training_id), INDEX IDX_112094D2E934951A (exercise_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE exercise_attribute_definition ADD CONSTRAINT FK_6B737A97E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE program_training_link ADD CONSTRAINT FK_9C7FCE2A3EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('ALTER TABLE program_training_link ADD CONSTRAINT FK_9C7FCE2ABEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F12469DE2 FOREIGN KEY (category_id) REFERENCES training_category (id)');
        $this->addSql('ALTER TABLE training_exercise_link ADD CONSTRAINT FK_112094D2BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE training_exercise_link ADD CONSTRAINT FK_112094D2E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise_attribute_definition DROP FOREIGN KEY FK_6B737A97E934951A');
        $this->addSql('ALTER TABLE program_training_link DROP FOREIGN KEY FK_9C7FCE2A3EB8070A');
        $this->addSql('ALTER TABLE program_training_link DROP FOREIGN KEY FK_9C7FCE2ABEFD98D1');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F12469DE2');
        $this->addSql('ALTER TABLE training_exercise_link DROP FOREIGN KEY FK_112094D2BEFD98D1');
        $this->addSql('ALTER TABLE training_exercise_link DROP FOREIGN KEY FK_112094D2E934951A');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE exercise_attribute_definition');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE program_training_link');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_category');
        $this->addSql('DROP TABLE training_exercise_link');
    }
}
