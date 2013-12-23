<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 05.12.13
 * Time: 20:36
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;
use Likedimion\Tools\Helper\PlayerDataHelper;

interface PlayerRegistrationServiceInterface {
    /**
     * @param \Likedimion\Tools\Helper\PlayerDataHelper $playerData
     * @return Player
     */
    public function createPlayer(PlayerDataHelper $playerData);
} 