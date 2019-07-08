<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190703132052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE predmeti (id INT AUTO_INCREMENT NOT NULL, ime VARCHAR(255) NOT NULL, kod VARCHAR(16) NOT NULL, program VARCHAR(255) NOT NULL, bodovi INT NOT NULL, sem_redovni INT NOT NULL, sem_izvanredni INT NOT NULL, izborni VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upisi (student_id INT NOT NULL, predmet_id INT NOT NULL, status VARCHAR(64) NOT NULL, INDEX IDX_EB553B58CB944F1A (student_id), INDEX IDX_EB553B58B4810FC4 (predmet_id), PRIMARY KEY(student_id, predmet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', password VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE upisi ADD CONSTRAINT FK_EB553B58CB944F1A FOREIGN KEY (student_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE upisi ADD CONSTRAINT FK_EB553B58B4810FC4 FOREIGN KEY (predmet_id) REFERENCES predmeti (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE upisi DROP FOREIGN KEY FK_EB553B58B4810FC4');
        $this->addSql('ALTER TABLE upisi DROP FOREIGN KEY FK_EB553B58CB944F1A');
        $this->addSql('DROP TABLE predmeti');
        $this->addSql('DROP TABLE upisi');
        $this->addSql('DROP TABLE user');
    }
}
