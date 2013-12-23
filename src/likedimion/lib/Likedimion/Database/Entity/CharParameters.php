<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 21:32
 */

namespace Likedimion\Database\Entity;

/**
 * Class CharParameters
 * @package Likedimion\Database\Entity
 *
 * @MappedSuperClass
 */
class CharParameters {
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var integer
     * @Column(type="integer", name="life", nullable=true)
     */
    protected $life;
    /**
     * @var integer
     * @Column(type="integer", name="max_life")
     */
    protected $maxLife = 0;
    /**
     * @var integer
     * @Column(type="integer", name="mana", nullable=true)
     */
    protected $mana;
    /**
     * @var integer
     * @Column(type="integer", name="max_mana")
     */
    protected $maxMana = 0;
    /**
     * @var bool
     * @Column(type="boolean", name="is_crim")
     */
    protected $isCrim = false;
    /**
     * @var bool
     * @Column(type="boolean", name="is_dead")
     */
    protected $isDead = false;
    /**
     * @var integer
     * @Column(type="string", name="crim_status", nullable=true)
     */
    protected $crimStatus;
    /**
     * @var integer
     * @Column(type="string", name="player_status", nullable=true)
     */
    protected $status;
    /**
     * @var integer
     * @Column(type="integer", name="experience")
     */
    protected $experience = 0;
    /**
     * @var integer
     * @Column(type="integer", name="need_experience")
     */
    protected $needExperience = 0;
    /**
     * @var integer
     * @Column(type="integer", name="level")
     */
    protected $level = 1;
    /**
     * @var integer
     * @Column(type="integer", name="last_life_regeneration", nullable=true)
     */
    protected $lastLifeRegenerationTime;
    /**
     * @var integer
     * @Column(type="integer", name="last_mana_regeneration", nullable=true)
     */
    protected $lastManaRegenerationTime;
    /**
     * @var bool
     * @Column(type="boolean", name="invisible")
     */
    protected $invisible = false;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife($life)
    {
        $this->life = $life;
    }

    /**
     * @return int
     */
    public function getMaxLife()
    {
        return $this->maxLife;
    }

    /**
     * @param int $maxLife
     */
    public function setMaxLife($maxLife)
    {
        $this->maxLife = $maxLife;
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana($mana)
    {
        $this->mana = $mana;
    }

    /**
     * @return int
     */
    public function getMaxMana()
    {
        return $this->maxMana;
    }

    /**
     * @param int $maxMana
     */
    public function setMaxMana($maxMana)
    {
        $this->maxMana = $maxMana;
    }

    /**
     * @return int
     */
    public function getIsCrim()
    {
        return $this->isCrim;
    }

    /**
     * @param int $isCrim
     */
    public function setIsCrim($isCrim)
    {
        $this->isCrim = $isCrim;
    }

    /**
     * @return int
     */
    public function getIsDead()
    {
        return $this->isDead;
    }

    /**
     * @param int $isDead
     */
    public function setIsDead($isDead)
    {
        $this->isDead = $isDead;
    }

    /**
     * @return int
     */
    public function getCrimStatus()
    {
        return $this->crimStatus;
    }

    /**
     * @param int $crimStatus
     */
    public function setCrimStatus($crimStatus)
    {
        $this->crimStatus = $crimStatus;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return int
     */
    public function getNeedExperience()
    {
        return $this->needExperience;
    }

    /**
     * @param int $needExperience
     */
    public function setNeedExperience($needExperience)
    {
        $this->needExperience = $needExperience;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getLastLifeRegenerationTime()
    {
        return $this->lastLifeRegenerationTime;
    }

    /**
     * @param int $lastLifeRegenerationTime
     */
    public function setLastLifeRegenerationTime($lastLifeRegenerationTime)
    {
        $this->lastLifeRegenerationTime = $lastLifeRegenerationTime;
    }

    /**
     * @return int
     */
    public function getLastManaRegenerationTime()
    {
        return $this->lastManaRegenerationTime;
    }

    /**
     * @param int $lastManaRegenerationTime
     */
    public function setLastManaRegenerationTime($lastManaRegenerationTime)
    {
        $this->lastManaRegenerationTime = $lastManaRegenerationTime;
    }

    /**
     * @return mixed
     */
    public function getInvisible()
    {
        return $this->invisible;
    }

    /**
     * @param mixed $invisible
     */
    public function setInvisible($invisible)
    {
        $this->invisible = $invisible;
    }

} 