<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405070629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, second_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, rating INT NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_92FB68EC54C8C93 (type_id), INDEX IDX_92FB68E44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, rent_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', soum INT NOT NULL, INDEX IDX_6D28840DE5FD6250 (rent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, INDEX IDX_741D53CDC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, begin_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', end_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', day_price INT NOT NULL, INDEX IDX_2784DCC19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent_place (rent_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_9563A17BE5FD6250 (rent_id), INDEX IDX_9563A17BDA6A219 (place_id), PRIMARY KEY(rent_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_place (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(255) NOT NULL, type_price INT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE device ADD CONSTRAINT FK_92FB68EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE device ADD CONSTRAINT FK_92FB68E44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DE5FD6250 FOREIGN KEY (rent_id) REFERENCES rent (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDC54C8C93 FOREIGN KEY (type_id) REFERENCES type_of_place (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE rent_place ADD CONSTRAINT FK_9563A17BE5FD6250 FOREIGN KEY (rent_id) REFERENCES rent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rent_place ADD CONSTRAINT FK_9563A17BDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE device DROP FOREIGN KEY FK_92FB68EC54C8C93');
        $this->addSql('ALTER TABLE device DROP FOREIGN KEY FK_92FB68E44F5D008');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DE5FD6250');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDC54C8C93');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC19EB6921');
        $this->addSql('ALTER TABLE rent_place DROP FOREIGN KEY FK_9563A17BE5FD6250');
        $this->addSql('ALTER TABLE rent_place DROP FOREIGN KEY FK_9563A17BDA6A219');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE rent_place');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE type_of_place');
        $this->addSql('DROP TABLE user');
    }
}
