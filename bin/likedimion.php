<?php
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Likedimion\Tools\Helper\LikedimionCommandHelper;
use Symfony\Component\Console\Helper\DialogHelper;

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 22:40
 */

require __DIR__."/../index.php";

$cli = new \Symfony\Component\Console\Application('Likedimion CLI', \Likedimion\Game::getInstance()->getVersion());
$entityManager = \Likedimion\Game::getInstance()->getContainer()->get("entity_manager");
$config = \Likedimion\Game::getInstance()->getConfig();

$translationsHelper = new \Likedimion\Tools\Helper\TranslationHelper();
$translationsHelper->setLocale(
    \Likedimion\Common\StringCommon::replaceKeyWords($config["app"]["locale"])
);
$translationsHelper->load();

$helperSet = \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
$helperSet->set(new DialogHelper(), 'dialog');
$helperSet->set($translationsHelper, 'translations');
$helperSet->set(new LikedimionCommandHelper(), "helpers");


$cli->setHelperSet($helperSet);

$cli->addCommands(array(
    //Migrations
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand(),


    new \Likedimion\Tools\Command\AccountRegistrationCommand(),
    new \Likedimion\Tools\Command\AuthorisationCommand(),
    new \Likedimion\Tools\Command\PlayerCreateCommand(),
    new \Likedimion\Tools\Command\PlayerAddExpCommand(),
    new \Likedimion\Tools\Command\LoadDefaultDataCommand()
));
\Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);
$cli->run();
