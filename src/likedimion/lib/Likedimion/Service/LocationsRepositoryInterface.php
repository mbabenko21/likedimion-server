<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:56
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Location;

interface LocationsRepositoryInterface {
    /**
     * @param string $tag
     * @return Location
     */
    public function findByTag($tag);

    /**
     * @param string $name
     * @return array
     */
    public function findLocationsByName($name);

    /**
     * @param Location $location
     * @return mixed
     */
    public function save(Location $location);

    /**
     * @param Location $location
     * @return mixed
     */
    public function remove(Location $location);

} 