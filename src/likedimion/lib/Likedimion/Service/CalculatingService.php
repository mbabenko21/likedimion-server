<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 23:01
 */

namespace Likedimion\Service;


interface CalculatingService {
    /**
     * @param object $object
     * @return mixed
     */
    public function calculate($object);
} 