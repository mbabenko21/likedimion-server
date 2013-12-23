<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:18
 */

namespace Likedimion\Database\Entity;

use Likedimion\Exception\ValidationException;

/**
 * Class Player
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\PlayerRepositoryImpl")
 * @Table(name="players")
 * @HasLifecycleCallbacks
 */
class Player
{
    const MALE = 1;
    const FEMALE = 2;

    const WARRIOR = 1;
    const MAGE = 2;
    const RANGER = 3;

    const HUMAN = 1;
    const ELVEN = 2;
    const GNOME = 3;
    const UNDEAD = 4;
    const DARK_ELVEN = 5;
    const ORK = 6;

    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var string
     * @Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var Account
     * @ManyToOne(targetEntity="Account", inversedBy="players")
     */
    protected $account;
    /**
     * @var int
     * @Column(name="class", type="integer")
     */
    protected $class;
    /**
     * @var PlayerStatistic
     * @OneToOne(targetEntity="PlayerStatistic", cascade={"persist", "remove"})
     * @JoinColumn(name="statistic_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $statistic;
    /**
     * @var int
     * @Column(name="sex", type="integer")
     */
    protected $sex;

    /**
     * @var \DateTime
     * @Column(type="date", name="create_date")
     */
    protected $createdDate;
    /**
     * @var int
     * @Column(type="integer", name="last_action_time", nullable=true)
     */
    protected $lastActionTime;
    /**
     * @var int
     * @Column(type="integer", name="race")
     */
    protected $race;
    /**
     * @var Location
     * @OneToOne(targetEntity="Location")
     * @JoinColumn(name="location_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $location;
    /**
     * @var PlayerCharParams
     * @OneToOne(targetEntity="PlayerCharParams", cascade={"persist", "remove"})
     * @JoinColumn(name="char_params_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $charParameters;
    /**
     * @var PlayerStats
     * @OneToOne(targetEntity="PlayerStats", cascade={"persist", "remove"})
     * @JoinColumn(name="player_stats_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $stats;
    /**
     * @var PlayerWarParameters
     * @OneToOne(targetEntity="PlayerWarParameters", cascade={"persist", "remove"})
     * @JoinColumn(name="war_parameters_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $war;

    public function __construct()
    {
        $this->setCreatedDate(new \DateTime());
        $this->setStatistic(new PlayerStatistic());
        $this->setCharParameters(new PlayerCharParams());
        $this->setStats(new PlayerStats());
        $this->setWar(new PlayerWarParameters());
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \Likedimion\Database\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param \Likedimion\Database\Entity\Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return int
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param int $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return \Likedimion\Database\Entity\PlayerStatistic
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param \Likedimion\Database\Entity\PlayerStatistic $statistic
     */
    public function setStatistic($statistic)
    {
        $this->statistic = $statistic;
        $statistic->setPlayer($this);
    }

    /**
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @PrePersist @PreUpdate
     */
    public function preSave()
    {
        $this->setLastActionTime(time());
        if (!in_array($this->getClass(), $this->getClasses())) {
            throw new ValidationException("player_class_is_not_valid");
        }
        if($this->getSex() != self::MALE and $this->getSex() != self::FEMALE){
            throw new ValidationException("player_sex_is_not_valid");
        }
    }

    /**
     * @return int
     */
    public function getLastActionTime()
    {
        return $this->lastActionTime;
    }

    /**
     * @param int $lastActionTime
     */
    public function setLastActionTime($lastActionTime)
    {
        $this->lastActionTime = $lastActionTime;
    }

    /**
     * @return array
     */
    protected function getClasses()
    {
        return array(
            self::WARRIOR, self::MAGE, self::RANGER
        );
    }

    /**
     * @return int
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param int $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return \Likedimion\Database\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param \Likedimion\Database\Entity\Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
        $location->addPlayer($this);
    }

    /**
     * @param PlayerCharParams $charParameters
     */
    public function setCharParameters($charParameters)
    {
        $this->charParameters = $charParameters;
        $charParameters->setPlayer($this);
    }

    /**
     * @return \Likedimion\Database\Entity\Stats
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * @param PlayerStats $stats
     */
    public function setStats($stats)
    {
        $this->stats = $stats;
        $stats->setPlayer($this);
    }

    /**
     * @return \Likedimion\Database\Entity\WarParameters
     */
    public function getWar()
    {
        return $this->war;
    }

    /**
     * @param PlayerWarParameters $war
     */
    public function setWar($war)
    {
        $this->war = $war;
        $war->setPlayer($this);
    }

    /**
     * @return PlayerCharParams
     */
    public function getCharParameters()
    {
        return $this->charParameters;
    }

} 