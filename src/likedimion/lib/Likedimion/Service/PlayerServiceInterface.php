<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:43
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;

interface PlayerServiceInterface extends LikedimionRepositoryInterface {

    /**
     * @param string $name
     * @param int $sex
     * @param int $class
     * @return Player
     */
    public function createPlayer($name, $sex, $class);

    /**
     * @return PlayerRepositoryInterface
     */
    public function getRepository();
} 