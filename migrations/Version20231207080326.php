<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207080326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, rarity_id INT DEFAULT NULL, item_type_id INT NOT NULL, attack_speed_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, flavor_text VARCHAR(255) DEFAULT NULL, sell_price INT DEFAULT NULL, armor_rating INT DEFAULT NULL, attack_rating INT DEFAULT NULL, INDEX IDX_1F1B251EF3747573 (rarity_id), INDEX IDX_1F1B251ECE11AAC7 (item_type_id), INDEX IDX_1F1B251EB1AD4A24 (attack_speed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE join_item_stats (id INT AUTO_INCREMENT NOT NULL, item_id_id INT DEFAULT NULL, stats_id_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_1582528355E38587 (item_id_id), INDEX IDX_158252839D9B3AF (stats_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, stats_weight INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, flavor_text VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_attack_speed (id INT AUTO_INCREMENT NOT NULL, speed DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ECE11AAC7 FOREIGN KEY (item_type_id) REFERENCES item_type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EB1AD4A24 FOREIGN KEY (attack_speed_id) REFERENCES weapon_attack_speed (id)');
        $this->addSql('ALTER TABLE join_item_stats ADD CONSTRAINT FK_1582528355E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE join_item_stats ADD CONSTRAINT FK_158252839D9B3AF FOREIGN KEY (stats_id_id) REFERENCES stats (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF3747573');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ECE11AAC7');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EB1AD4A24');
        $this->addSql('ALTER TABLE join_item_stats DROP FOREIGN KEY FK_1582528355E38587');
        $this->addSql('ALTER TABLE join_item_stats DROP FOREIGN KEY FK_158252839D9B3AF');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_type');
        $this->addSql('DROP TABLE join_item_stats');
        $this->addSql('DROP TABLE rarity');
        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE weapon_attack_speed');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
