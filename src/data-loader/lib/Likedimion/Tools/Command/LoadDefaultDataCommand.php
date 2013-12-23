<?php
use Likedimion\Tools\Command\LikedimionCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 20.12.13
 * Time: 20:47
 */
namespace Likedimion\Tools\Command;

use Likedimion\Tools\Command\LikedimionCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoadDefaultDataCommand extends LikedimionCommand {
    protected function configure(){
        $this->setName("likedimion:db:load_default_data");
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $output->writeln("work!");
    }
} 