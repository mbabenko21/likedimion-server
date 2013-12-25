<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:52
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;

interface ExperienceService {


    /**
     * @param Player $player
     * @return int
     */
    public function getNeedExpForNextLevel(Player $player);
} 