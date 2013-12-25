<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:01
 */

namespace Likedimion\Tools;


use Likedimion\Events\EventsStore;
use Likedimion\Game;
use Likedimion\Listener\PlayerListener;
use Symfony\Component\EventDispatcher\EventDispatcher;

class LikedimionEventDispatcher extends EventDispatcher
{
    public function addListeners()
    {
        $container = Game::getInstance()->getContainer();
        $this->addListener(EventsStore::LVL_UP, array($container->get("player_listener"), "onLvlUp"));
        $this->addListener(EventsStore::ADD_EXP, array($container->get("player_listener"), "onAddExp"));
    }
} 