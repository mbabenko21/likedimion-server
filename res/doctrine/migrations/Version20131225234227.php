<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131225234227 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A69B6B5FBA");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A69B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A69B6B5FBA");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A69B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
    }
}
