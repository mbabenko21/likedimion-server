<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:53
 */

namespace Likedimion\Database\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Area;
use Likedimion\Service\AreaRepositoryInterface;

class AreaRepositoryImpl extends EntityRepository implements AreaRepositoryInterface {

    /**
     * @param string $name
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Area
     */
    public function findAreaByName($name)
    {
        $area = $this->findOneBy(array("name" => $name));
        if($area instanceof Area !== true){
            throw new EntityNotFoundException();
        }
        return $area;
    }

    /**
     * @param string $tag
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Area
     */
    public function findAreaByTag($tag)
    {
        $area = $this->findOneBy(array("tag" => $tag));
        if($area instanceof Area !== true){
            throw new EntityNotFoundException();
        }
        return $area;
    }

    /**
     * @param Area $area
     * @return Area
     */
    public function save(Area $area)
    {
        $this->_em->persist($area);
        $this->_em->flush();
    }

    /**
     * @param Area $area
     * @return void
     */
    public function remove(Area $area)
    {
        $this->_em->remove($area);
    }
}