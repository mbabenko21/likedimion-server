<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:45
 */

namespace Likedimion\Database\Entity;

/**
 * Class PlayerStats
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="player_stats")
 */
class PlayerStats extends Stats {
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
} 