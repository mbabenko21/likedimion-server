<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131220200313 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE items_requires (id INT AUTO_INCREMENT NOT NULL, str INT NOT NULL, dex INT NOT NULL, `int` INT NOT NULL, end INT NOT NULL, spr INT NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE weapons (id INT AUTO_INCREMENT NOT NULL, requires_id INT DEFAULT NULL, min_phys_damage INT NOT NULL, max_phys_damage INT NOT NULL, attack_speed INT NOT NULL, name VARCHAR(255) NOT NULL, info LONGTEXT NOT NULL, tag VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_520EBBE1389B783 (tag), UNIQUE INDEX UNIQ_520EBBE110F39319 (requires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE weapons ADD CONSTRAINT FK_520EBBE110F39319 FOREIGN KEY (requires_id) REFERENCES items_requires (id) ON DELETE SET NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE weapons DROP FOREIGN KEY FK_520EBBE110F39319");
        $this->addSql("DROP TABLE items_requires");
        $this->addSql("DROP TABLE weapons");
    }
}
