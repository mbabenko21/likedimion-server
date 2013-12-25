<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 23:27
 */

namespace Likedimion\Events;


use Likedimion\Database\Entity\Player;
use Symfony\Component\EventDispatcher\Event;

class PlayerEvent extends Event{
    protected $player;
    public function __construct(Player $player){
        $this->player = $player;
    }

    /**
     * @return \Likedimion\Database\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
} 