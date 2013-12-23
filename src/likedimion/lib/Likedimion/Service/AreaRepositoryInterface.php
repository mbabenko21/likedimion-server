<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:52
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Area;

interface AreaRepositoryInterface {
    /**
     * @param string $name
     * @return Area
     */
    public function findAreaByName($name);

    /**
     * @param string $tag
     * @return Area
     */
    public function findAreaByTag($tag);

    /**
     * @param Area $area
     * @return Area
     */
    public function save(Area $area);

    /**
     * @param Area $area
     * @return void
     */
    public function remove(Area $area);
} 