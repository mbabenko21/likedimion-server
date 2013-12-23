<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:58
 */

namespace Likedimion\Database\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Location;
use Likedimion\Service\LocationsRepositoryInterface;

class LocationsRepositoryImpl extends EntityRepository implements LocationsRepositoryInterface {

    /**
     * @param string $tag
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Location
     */
    public function findByTag($tag)
    {
        $location = $this->findOneBy(array("tag" => $tag));
        if($location instanceof Location === false){
            throw new EntityNotFoundException();
        }
        return $location;
    }

    /**
     * @param string $name
     * @return array
     */
    public function findLocationsByName($name)
    {
        return $this->findBy(array("name" => $name));
    }

    /**
     * @param Location $location
     * @return mixed
     */
    public function save(Location $location)
    {
        $this->_em->persist($location);
        $this->_em->flush();
    }

    /**
     * @param Location $location
     * @return mixed
     */
    public function remove(Location $location)
    {
        $this->_em->remove($location);
    }
}