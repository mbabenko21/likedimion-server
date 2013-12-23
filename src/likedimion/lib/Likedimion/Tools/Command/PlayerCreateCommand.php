<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 0:52
 */

namespace Likedimion\Tools\Command;


use Likedimion\Exception\RegistrationException;
use Likedimion\Game;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\PlayerRegistrationServiceInterface;
use Likedimion\Service\TranslationsHelperInterface;
use Likedimion\Tools\Helper\LikedimionCommandHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayerCreateCommand extends Command
{
    protected function configure()
    {
        $this->setName("likedimion:player:create");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $helpers LikedimionCommandHelper */
        $helpers = $this->getHelperSet()->get("helpers");
        /** @var $translations TranslationsHelperInterface */
        $translations = $this->getHelper("translations");
        $authData = $helpers->authDialog($this, $output, false);

        /** @var $authService AuthServiceInterface */
        $authService = Game::getInstance()->getContainer()->get("auth_service");
        $token = $authService->login($authData->getLogin(), $authData->getPassword(), $authData->getRememberMe());
        if ($token !== false) {
            Game::getInstance()->setAuthToken($token);

            $player = $helpers->createPlayerDialog($this, $output);

            /** @var $playerRegistrationService PlayerRegistrationServiceInterface */
            $playerRegistrationService = Game::getInstance()->getContainer()->get("player_registration_service");
            try {
                $player = $playerRegistrationService->createPlayer($player);
                $output->writeln(
                    sprintf($translations->getLine("player_create_complete"), $player->getName())
                );
            } catch (RegistrationException $e) {
                $output->writeln($translations->getLine($e->getMessage()));
            }
        } else {
            $output->writeln($translations->getLine("auth_fail"));
        }

    }
} 