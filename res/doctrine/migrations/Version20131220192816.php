<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131220192816 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, token_id INT DEFAULT NULL, current_player_id INT DEFAULT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, create_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_CAC89EACAA08CB10 (login), UNIQUE INDEX UNIQ_CAC89EACE7927C74 (email), UNIQUE INDEX UNIQ_CAC89EAC41DEE7B9 (token_id), UNIQUE INDEX UNIQ_CAC89EAC42C04473 (current_player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE accounts_players (account_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_4E0D31DA99E6F5DF (player_id), UNIQUE INDEX UNIQ_4E0D31DA9B6B5FBA (account_id), PRIMARY KEY(account_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE areas (id INT AUTO_INCREMENT NOT NULL, parent_area_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, info LONGTEXT NOT NULL, area_unique_tag VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_58B0B25C5E237E06 (name), UNIQUE INDEX UNIQ_58B0B25C89BEB03 (area_unique_tag), INDEX IDX_58B0B25CCF4734DA (parent_area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE doors (id INT AUTO_INCREMENT NOT NULL, target_location_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_5E5B762A81776E84 (target_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE locations (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, info LONGTEXT NOT NULL, loc_unique_tag VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_17E64ABA8E7B9E7D (loc_unique_tag), INDEX IDX_17E64ABABD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE players (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, statistic_id INT DEFAULT NULL, location_id INT DEFAULT NULL, char_params_id INT DEFAULT NULL, player_stats_id INT DEFAULT NULL, war_parameters_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, class INT NOT NULL, sex INT NOT NULL, create_date DATE NOT NULL, last_action_time INT DEFAULT NULL, race INT NOT NULL, INDEX IDX_264E43A69B6B5FBA (account_id), UNIQUE INDEX UNIQ_264E43A653B6268F (statistic_id), UNIQUE INDEX UNIQ_264E43A664D218E (location_id), UNIQUE INDEX UNIQ_264E43A6FDC41237 (char_params_id), UNIQUE INDEX UNIQ_264E43A6767D7562 (player_stats_id), UNIQUE INDEX UNIQ_264E43A6426C9158 (war_parameters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE players_char_params (id INT AUTO_INCREMENT NOT NULL, life INT DEFAULT NULL, max_life INT NOT NULL, mana INT DEFAULT NULL, max_mana INT NOT NULL, is_crim TINYINT(1) NOT NULL, is_dead TINYINT(1) NOT NULL, crim_status VARCHAR(255) DEFAULT NULL, player_status VARCHAR(255) DEFAULT NULL, experience INT NOT NULL, need_experience INT NOT NULL, level INT NOT NULL, last_life_regeneration INT DEFAULT NULL, last_mana_regeneration INT DEFAULT NULL, invisible TINYINT(1) NOT NULL, exp_rate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE players_statistic (id INT AUTO_INCREMENT NOT NULL, pvp INT NOT NULL, pve INT NOT NULL, arena_pvp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE player_stats (id INT AUTO_INCREMENT NOT NULL, strenge INT NOT NULL, dexterity INT NOT NULL, intelligence INT NOT NULL, endurance INT NOT NULL, spirituality INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE player_war_parameters (id INT AUTO_INCREMENT NOT NULL, p_hit INT NOT NULL, m_hit INT NOT NULL, p_min_damage INT NOT NULL, m_min_damage INT NOT NULL, p_max_damage INT NOT NULL, m_max_damage INT NOT NULL, p_def INT NOT NULL, m_def INT NOT NULL, p_shield INT NOT NULL, m_shield INT NOT NULL, p_bias INT NOT NULL, m_bias INT NOT NULL, p_crit INT NOT NULL, m_crit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE premiums (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, premium_type INT NOT NULL, INDEX IDX_865585B09B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE tokens (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, end_date DATETIME NOT NULL, start_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_AA5A118E1D775834 (value), UNIQUE INDEX UNIQ_AA5A118E9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC41DEE7B9 FOREIGN KEY (token_id) REFERENCES tokens (id) ON DELETE SET NULL");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC42C04473 FOREIGN KEY (current_player_id) REFERENCES players (id) ON DELETE SET NULL");
        $this->addSql("ALTER TABLE accounts_players ADD CONSTRAINT FK_4E0D31DA9B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE accounts_players ADD CONSTRAINT FK_4E0D31DA99E6F5DF FOREIGN KEY (player_id) REFERENCES players (id)");
        $this->addSql("ALTER TABLE areas ADD CONSTRAINT FK_58B0B25CCF4734DA FOREIGN KEY (parent_area_id) REFERENCES areas (id)");
        $this->addSql("ALTER TABLE doors ADD CONSTRAINT FK_5E5B762A81776E84 FOREIGN KEY (target_location_id) REFERENCES locations (id)");
        $this->addSql("ALTER TABLE locations ADD CONSTRAINT FK_17E64ABABD0F409C FOREIGN KEY (area_id) REFERENCES areas (id)");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A69B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A653B6268F FOREIGN KEY (statistic_id) REFERENCES players_statistic (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A664D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE SET NULL");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A6FDC41237 FOREIGN KEY (char_params_id) REFERENCES players_char_params (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A6767D7562 FOREIGN KEY (player_stats_id) REFERENCES player_stats (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A6426C9158 FOREIGN KEY (war_parameters_id) REFERENCES player_war_parameters (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE premiums ADD CONSTRAINT FK_865585B09B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE tokens ADD CONSTRAINT FK_AA5A118E9B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE accounts_players DROP FOREIGN KEY FK_4E0D31DA9B6B5FBA");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A69B6B5FBA");
        $this->addSql("ALTER TABLE premiums DROP FOREIGN KEY FK_865585B09B6B5FBA");
        $this->addSql("ALTER TABLE tokens DROP FOREIGN KEY FK_AA5A118E9B6B5FBA");
        $this->addSql("ALTER TABLE areas DROP FOREIGN KEY FK_58B0B25CCF4734DA");
        $this->addSql("ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABABD0F409C");
        $this->addSql("ALTER TABLE doors DROP FOREIGN KEY FK_5E5B762A81776E84");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A664D218E");
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC42C04473");
        $this->addSql("ALTER TABLE accounts_players DROP FOREIGN KEY FK_4E0D31DA99E6F5DF");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A6FDC41237");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A653B6268F");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A6767D7562");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A6426C9158");
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC41DEE7B9");
        $this->addSql("DROP TABLE accounts");
        $this->addSql("DROP TABLE accounts_players");
        $this->addSql("DROP TABLE areas");
        $this->addSql("DROP TABLE doors");
        $this->addSql("DROP TABLE locations");
        $this->addSql("DROP TABLE players");
        $this->addSql("DROP TABLE players_char_params");
        $this->addSql("DROP TABLE players_statistic");
        $this->addSql("DROP TABLE player_stats");
        $this->addSql("DROP TABLE player_war_parameters");
        $this->addSql("DROP TABLE premiums");
        $this->addSql("DROP TABLE tokens");
    }
}
