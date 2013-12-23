<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 0:28
 */

namespace Likedimion\Service;


use Doctrine\ORM\EntityRepository;

interface LikedimionRepositoryInterface {
    /**
     * @return EntityRepository
     */
    public function getRepository();
} 