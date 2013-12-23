<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 20:14
 */

namespace Likedimion\Database\Entity;

/**
 * Class Door
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="doors")
 */
class Door {
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
     * @var Location
     * @ManyToOne(targetEntity="Location", inversedBy="doors")
     * @JoinColumn(name="target_location_id", referencedColumnName="id")
     */
    protected $targetLocation;


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
     * @return \Likedimion\Database\Entity\Location
     */
    public function getTargetLocation()
    {
        return $this->targetLocation;
    }

    /**
     * @param \Likedimion\Database\Entity\Location $targetLocation
     */
    public function setTargetLocation($targetLocation)
    {
        $this->targetLocation = $targetLocation;
        $targetLocation->addDoor($this);
    }
} 