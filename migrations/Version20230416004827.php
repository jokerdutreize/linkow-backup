<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230416004827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD facelink VARCHAR(255) DEFAULT NULL, ADD instalink VARCHAR(255) DEFAULT NULL, ADD linkedlink VARCHAR(255) DEFAULT NULL, ADD twitterlink VARCHAR(255) DEFAULT NULL, DROP face_link, DROP insta_link, DROP linked_link, DROP twitter_link');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD face_link VARCHAR(255) DEFAULT NULL, ADD insta_link VARCHAR(255) DEFAULT NULL, ADD linked_link VARCHAR(255) DEFAULT NULL, ADD twitter_link VARCHAR(255) DEFAULT NULL, DROP facelink, DROP instalink, DROP linkedlink, DROP twitterlink');
    }
}
