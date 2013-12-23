<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:47
 */

namespace Likedimion\Database\Entity;

/**
 * Class PlayerWarParameters
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="player_war_parameters")
 */
class PlayerWarParameters extends WarParameters {
    /**
     * @var Player
     * @OneToOne(targetEntity="Player", cascade={"persist"})
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
} 