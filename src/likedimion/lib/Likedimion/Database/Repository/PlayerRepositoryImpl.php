<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 0:15
 */

namespace Likedimion\Database\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Player;
use Likedimion\Database\Entity\PlayerStatistic;
use Likedimion\Service\PlayerRepositoryInterface;

class PlayerRepositoryImpl extends EntityRepository implements PlayerRepositoryInterface {

    /**
     * @param string $name
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Player
     */
    public function findPlayerByName($name)
    {
        $player = $this->findOneBy(array("name" => $name));
        if($player instanceof Player === false) {
            throw new EntityNotFoundException();
        }
        return $player;
    }


    /**
     * @param Player $player
     * @return void
     */
    public function save(Player $player)
    {
        $this->_em->persist($player);
        $this->_em->flush();
    }

    /**
     * @param Player $player
     * @return void
     */
    public function remove(Player $player)
    {
        $this->_em->remove($player);
    }

    /**
     * @param PlayerStatistic $playerStatistic
     * @return PlayerStatistic
     */
    public function saveStatistic(PlayerStatistic $playerStatistic)
    {
        $this->_em->persist($playerStatistic);
    }
}