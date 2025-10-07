<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251007190616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AEDAD51C539B0606 ON exercise (uid)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C539B0606 ON exercise (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AEDAD51C989D9B62 ON exercise (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B737A97539B0606 ON exercise_attribute_definition (uid)');
        $this->addSql('CREATE INDEX IDX_6B737A97539B0606 ON exercise_attribute_definition (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92ED7784539B0606 ON program (uid)');
        $this->addSql('CREATE INDEX IDX_92ED7784539B0606 ON program (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92ED7784989D9B62 ON program (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C7FCE2A539B0606 ON program_training_link (uid)');
        $this->addSql('CREATE INDEX IDX_9C7FCE2A539B0606 ON program_training_link (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22B091BB539B0606 ON set_atribute_value (uid)');
        $this->addSql('CREATE INDEX IDX_22B091BB539B0606 ON set_atribute_value (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5128A8F539B0606 ON training (uid)');
        $this->addSql('CREATE INDEX IDX_D5128A8F539B0606 ON training (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5128A8F989D9B62 ON training (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E1290A56539B0606 ON training_category (uid)');
        $this->addSql('CREATE INDEX IDX_E1290A56539B0606 ON training_category (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E1290A56989D9B62 ON training_category (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_112094D2539B0606 ON training_exercise_link (uid)');
        $this->addSql('CREATE INDEX IDX_112094D2539B0606 ON training_exercise_link (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4E57311C539B0606 ON user_exercise (uid)');
        $this->addSql('CREATE INDEX IDX_4E57311C539B0606 ON user_exercise (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAE0698E539B0606 ON user_program (uid)');
        $this->addSql('CREATE INDEX IDX_CAE0698E539B0606 ON user_program (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D024457539B0606 ON user_set (uid)');
        $this->addSql('CREATE INDEX IDX_D024457539B0606 ON user_set (uid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_359F6E8F539B0606 ON user_training (uid)');
        $this->addSql('CREATE INDEX IDX_359F6E8F539B0606 ON user_training (uid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_AEDAD51C539B0606 ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51C539B0606 ON exercise');
        $this->addSql('DROP INDEX UNIQ_AEDAD51C989D9B62 ON exercise');
        $this->addSql('ALTER TABLE exercise DROP slug');
        $this->addSql('DROP INDEX UNIQ_6B737A97539B0606 ON exercise_attribute_definition');
        $this->addSql('DROP INDEX IDX_6B737A97539B0606 ON exercise_attribute_definition');
        $this->addSql('DROP INDEX UNIQ_92ED7784539B0606 ON program');
        $this->addSql('DROP INDEX IDX_92ED7784539B0606 ON program');
        $this->addSql('DROP INDEX UNIQ_92ED7784989D9B62 ON program');
        $this->addSql('DROP INDEX UNIQ_9C7FCE2A539B0606 ON program_training_link');
        $this->addSql('DROP INDEX IDX_9C7FCE2A539B0606 ON program_training_link');
        $this->addSql('DROP INDEX UNIQ_22B091BB539B0606 ON set_atribute_value');
        $this->addSql('DROP INDEX IDX_22B091BB539B0606 ON set_atribute_value');
        $this->addSql('DROP INDEX UNIQ_D5128A8F539B0606 ON training');
        $this->addSql('DROP INDEX IDX_D5128A8F539B0606 ON training');
        $this->addSql('DROP INDEX UNIQ_D5128A8F989D9B62 ON training');
        $this->addSql('DROP INDEX UNIQ_E1290A56539B0606 ON training_category');
        $this->addSql('DROP INDEX IDX_E1290A56539B0606 ON training_category');
        $this->addSql('DROP INDEX UNIQ_E1290A56989D9B62 ON training_category');
        $this->addSql('DROP INDEX UNIQ_112094D2539B0606 ON training_exercise_link');
        $this->addSql('DROP INDEX IDX_112094D2539B0606 ON training_exercise_link');
        $this->addSql('DROP INDEX UNIQ_4E57311C539B0606 ON user_exercise');
        $this->addSql('DROP INDEX IDX_4E57311C539B0606 ON user_exercise');
        $this->addSql('DROP INDEX UNIQ_CAE0698E539B0606 ON user_program');
        $this->addSql('DROP INDEX IDX_CAE0698E539B0606 ON user_program');
        $this->addSql('DROP INDEX UNIQ_D024457539B0606 ON user_set');
        $this->addSql('DROP INDEX IDX_D024457539B0606 ON user_set');
        $this->addSql('DROP INDEX UNIQ_359F6E8F539B0606 ON user_training');
        $this->addSql('DROP INDEX IDX_359F6E8F539B0606 ON user_training');
    }
}
