<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251007184128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create base user tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE set_atribute_value (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, value VARCHAR(255) NOT NULL, user_set_id INT NOT NULL, attribute_id INT NOT NULL, INDEX IDX_22B091BB75A91625 (user_set_id), INDEX IDX_22B091BBB6E62EFA (attribute_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user_exercise (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, training_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_4E57311CBEFD98D1 (training_id), INDEX IDX_4E57311CE934951A (exercise_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user_program (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, started_at DATETIME NOT NULL, ended_at DATETIME NOT NULL, program_id INT NOT NULL, INDEX IDX_CAE0698E3EB8070A (program_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user_set (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, order_in_exercise INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_D024457E934951A (exercise_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user_training (id INT AUTO_INCREMENT NOT NULL, uid CHAR(36) NOT NULL, date DATETIME NOT NULL, program_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_359F6E8F3EB8070A (program_id), INDEX IDX_359F6E8FBEFD98D1 (training_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE set_atribute_value ADD CONSTRAINT FK_22B091BB75A91625 FOREIGN KEY (user_set_id) REFERENCES user_set (id)');
        $this->addSql('ALTER TABLE set_atribute_value ADD CONSTRAINT FK_22B091BBB6E62EFA FOREIGN KEY (attribute_id) REFERENCES exercise_attribute_definition (id)');
        $this->addSql('ALTER TABLE user_exercise ADD CONSTRAINT FK_4E57311CBEFD98D1 FOREIGN KEY (training_id) REFERENCES user_training (id)');
        $this->addSql('ALTER TABLE user_exercise ADD CONSTRAINT FK_4E57311CE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE user_program ADD CONSTRAINT FK_CAE0698E3EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('ALTER TABLE user_set ADD CONSTRAINT FK_D024457E934951A FOREIGN KEY (exercise_id) REFERENCES user_exercise (id)');
        $this->addSql('ALTER TABLE user_training ADD CONSTRAINT FK_359F6E8F3EB8070A FOREIGN KEY (program_id) REFERENCES user_program (id)');
        $this->addSql('ALTER TABLE user_training ADD CONSTRAINT FK_359F6E8FBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE set_atribute_value DROP FOREIGN KEY FK_22B091BB75A91625');
        $this->addSql('ALTER TABLE set_atribute_value DROP FOREIGN KEY FK_22B091BBB6E62EFA');
        $this->addSql('ALTER TABLE user_exercise DROP FOREIGN KEY FK_4E57311CBEFD98D1');
        $this->addSql('ALTER TABLE user_exercise DROP FOREIGN KEY FK_4E57311CE934951A');
        $this->addSql('ALTER TABLE user_program DROP FOREIGN KEY FK_CAE0698E3EB8070A');
        $this->addSql('ALTER TABLE user_set DROP FOREIGN KEY FK_D024457E934951A');
        $this->addSql('ALTER TABLE user_training DROP FOREIGN KEY FK_359F6E8F3EB8070A');
        $this->addSql('ALTER TABLE user_training DROP FOREIGN KEY FK_359F6E8FBEFD98D1');
        $this->addSql('DROP TABLE set_atribute_value');
        $this->addSql('DROP TABLE user_exercise');
        $this->addSql('DROP TABLE user_program');
        $this->addSql('DROP TABLE user_set');
        $this->addSql('DROP TABLE user_training');
    }
}
