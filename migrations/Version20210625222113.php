<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210625222113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, creation_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, location VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, state VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5E90F6D671F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, inscription_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_8D93D6495DAC5993 (inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D671F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6495DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D671F7E88B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6495DAC5993');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE `user`');
    }
}
