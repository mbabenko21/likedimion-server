<?php
use Symfony\Component\Yaml\Yaml;
date_default_timezone_set('Europe/Moscow');
ini_set('display_errors','On');
error_reporting(E_ALL | E_STRICT);

define("ROOT_DIR", dirname(__FILE__));
define("RES_DIR", dirname(__FILE__).DIRECTORY_SEPARATOR."res");
define("SRC_DIR", dirname(__FILE__).DIRECTORY_SEPARATOR."src");

$loader = require ROOT_DIR."/vendor/autoload.php";

$loader->add("Likedimion\\", SRC_DIR."/likedimion/lib");
$loader->add("Likedimion\\Proxies", RES_DIR."/doctrine/proxy");
$loader->add("Likedimion\\Client", SRC_DIR."/ldc/lib");
$loader->add("Likedimion\\", SRC_DIR."/data-loader/lib");
$loader->add("Migrations\\", RES_DIR."/doctrine/migrations");

$game = \Likedimion\Game::getInstance();
$config = Yaml::parse(file_get_contents(RES_DIR."/config.yml"));
define("DATA_DIR", dirname(__FILE__).DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."".$config["app"]["base_locale"]);
$game->setConfig($config);
$game->play();
