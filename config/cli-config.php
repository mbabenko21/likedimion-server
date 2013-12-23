<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 21:52
 */
require __DIR__ . "/../index.php";

$em = \Likedimion\Game::getInstance()->getContainer()->get("entity_manager");

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);