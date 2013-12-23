<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 19:49
 */

namespace Likedimion\Database\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Location
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\LocationsRepositoryImpl")
 * @Table(name="locations")
 */
class Location {
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(type="string", name="name")
     */
    protected $name;
    /**
     * @var Area
     * @ManyToOne(targetEntity="Area", inversedBy="locations")
     */
    protected $area;

    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Door", mappedBy="locations", cascade={"persist", "remove"})
     */
    protected $doors;

    /**
     * @var string
     * @Column(name="info", type="text")
     */
    protected $info;
    /**
     * @var string
     * @Column(name="loc_unique_tag", type="string", unique=true)
     */
    protected $tag;
    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Player", mappedBy="location")
     */
    protected $playersList;

    public function __construct(){
        $this->doors = new ArrayCollection();
        $this->playersList = new ArrayCollection();
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
     * @return \Likedimion\Database\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param \Likedimion\Database\Entity\Area $area
     */
    public function setArea($area)
    {
        $this->area = $area;
        $area->addLocation($this);
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getDoors()
    {
        return $this->doors;
    }

    public function addDoor(Door $door){
        $this->doors->add($door);
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        if(substr($tag, 0, 4) != "loc."){
           $tag = "loc.".$tag;
        }
        $this->tag = $tag;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPlayersList()
    {
        return $this->playersList;
    }

    public function addPlayer(Player $player){
        $this->playersList->add($player);
    }

} 