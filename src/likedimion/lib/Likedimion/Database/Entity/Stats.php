<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 21:53
 */

namespace Likedimion\Database\Entity;

/**
 * Class PlayerStats
 * @package Likedimion\Database\Entity
 *
 * @MappedSuperClass
 */
class Stats {
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var int
     * @Column(type="integer")
     */
    protected $strenge = 0;
    /**
     * @var int
     * @Column(type="integer")
     */
    protected $dexterity = 0;
    /**
     * @var int
     * @Column(type="integer")
     */
    protected $intelligence = 0;
    /**
     * @var int
     * @Column(type="integer")
     */
    protected $endurance = 0;
    /**
     * @var int
     * @Column(type="integer")
     */
    protected $spirituality = 0;


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
    public function getStrenge()
    {
        return $this->strenge;
    }

    /**
     * @param int $strenge
     */
    public function setStrenge($strenge)
    {
        $this->strenge = $strenge;
    }

    /**
     * @return int
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param int $dexterity
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return int
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param int $intelligence
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return int
     */
    public function getEndurance()
    {
        return $this->endurance;
    }

    /**
     * @param int $endurance
     */
    public function setEndurance($endurance)
    {
        $this->endurance = $endurance;
    }

    /**
     * @return int
     */
    public function getSpirituality()
    {
        return $this->spirituality;
    }

    /**
     * @param int $spirituality
     */
    public function setSpirituality($spirituality)
    {
        $this->spirituality = $spirituality;
    }
} 