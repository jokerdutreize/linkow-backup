<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414222602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD firstame VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD job VARCHAR(255) DEFAULT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD illustration VARCHAR(255) DEFAULT NULL, ADD face_link VARCHAR(255) DEFAULT NULL, ADD insta_link VARCHAR(255) DEFAULT NULL, ADD linked_link VARCHAR(255) DEFAULT NULL, ADD twitter_link VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP firstame, DROP lastname, DROP job, DROP phone, DROP illustration, DROP face_link, DROP insta_link, DROP linked_link, DROP twitter_link');
    }
}
