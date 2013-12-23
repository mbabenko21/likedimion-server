<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 19:52
 */

namespace Likedimion\Database\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Area
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\AreasRepositoryImpl")
 * @Table(name="areas")
 */
class Area {
    /**
     * @var int
     * @Id @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(type="string", unique=true)
     */
    protected $name;
    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Area", mappedBy="parentArea")
     */
    protected $childrenAreas;
    /**
     * @var Area
     * @ManyToOne(targetEntity="Area", inversedBy="childrenAreas")
     * @JoinColumn(name="parent_area_id", referencedColumnName="id")
     */
    protected $parentArea;
    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Location", mappedBy="area",  cascade={"persist", "remove"})
     */
    protected $locations;
    /**
     * @var string
     * @Column(name="info", type="text")
     */
    protected $info;

    /**
     * @var string
     * @Column(name="area_unique_tag", type="string", unique=true)
     */
    protected $tag;

    public function __construct(){
        $this->childrenAreas = new ArrayCollection();
        $this->locations = new ArrayCollection();
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
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChildrenAreas()
    {
        return $this->childrenAreas;
    }

    /**
     * @return \Likedimion\Database\Entity\Area
     */
    public function getParentArea()
    {
        return $this->parentArea;
    }

    /**
     * @param \Likedimion\Database\Entity\Area $parentArea
     */
    public function setParentArea($parentArea)
    {
        $this->parentArea = $parentArea;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getLocations()
    {
        return $this->locations;
    }

    public function addLocation(Location $location){
        $this->locations->add($location);
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
        if(substr($tag, 0,5) != "area."){
            $tag = "area.".$tag;
        }
        $this->tag = $tag;
    }

} 