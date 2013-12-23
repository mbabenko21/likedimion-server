<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 04.12.13
 * Time: 22:53
 */

namespace Likedimion\Tools\Command;


use Likedimion\Game;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\TranslationsHelperInterface;
use Likedimion\Tools\Helper\LikedimionCommandHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AuthorisationCommand extends Command {
    protected function configure() {
        $this->setName("likedimion:auth:login");
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        /** @var $helpers LikedimionCommandHelper */
        $helpers = $this->getHelperSet()->get("helpers");
        $authData = $helpers->authDialog($this, $output);

        /** @var $authService AuthServiceInterface */
        $authService = Game::getInstance()->getContainer()->get("auth_service");
        $token = $authService->login($authData->getLogin(), $authData->getPassword(), $authData->getRememberMe());

        $output->writeln($token->getValue());
    }
} 