<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 04.12.13
 * Time: 21:43
 */

namespace Likedimion\Tools\Command;


use Likedimion\Exception\AccountServiceException;
use Likedimion\Game;
use Likedimion\Service\AccountServiceInterface;
use Likedimion\Service\TranslationsHelperInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AccountRegistrationCommand extends Command {

    protected function configure() {
        $this->setName("likedimion:account:registration");
        $this->setDescription("Account registration");
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        /** @var $dialog DialogHelper */
        $dialog = $this->getHelperSet()->get("dialog");
        /** @var $translations TranslationsHelperInterface */
        $translations = $this->getHelper("translations");
        $login = $dialog->ask(
            $output,
            $translations->getLine("please_input_login"),
            false
        );
        $password = $dialog->askHiddenResponse(
           $output,
            $translations->getLine("please_input_password"),
            "password"
        );

        $passwordConfirm = $dialog->askHiddenResponse(
            $output,
            $translations->getLine("please_confirm_password"),
            "password"
        );
        /** @var $accountService AccountServiceInterface */
        $accountService = Game::getInstance()->getContainer()->get("account_service");
        try {
            $accountService->registration($login, $password, $passwordConfirm);
            $output->writeln(sprintf("<info>%s</info>", $translations->getLine("registration_complete")));
        } catch(AccountServiceException $e){
            $output->writeln(sprintf("<comment>%s</comment>", $translations->getLine($e->getMessage())));
        }
    }
} 