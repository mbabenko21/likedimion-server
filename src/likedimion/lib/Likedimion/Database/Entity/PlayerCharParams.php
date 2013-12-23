<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:43
 */

namespace Likedimion\Database\Entity;

/**
 * Class PlayerCharParams
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="players_char_params")
 */
class PlayerCharParams extends CharParameters {
    /**
     * @var Player
     * @OneToOne(targetEntity="Player")
     * @JoinColumn(name="player_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $player;

    /**
     * @return \Likedimion\Database\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param \Likedimion\Database\Entity\Player $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    public function addExperience($experience){
        $currentExp = $this->getExperience();
        $newExperience = $currentExp + $experience;
        if($newExperience >= $this->getNeedExperience()){
            $exp = $newExperience - $this->getNeedExperience();
            $this->setExperience($exp);
            $this->addLvl(1);
        }
    }

    /**
     * @param int $count
     */
    public function addLvl($count){
        $this->setLevel($this->getLevel() + $count);
        //TODO: Event LvlUp
    }
} 