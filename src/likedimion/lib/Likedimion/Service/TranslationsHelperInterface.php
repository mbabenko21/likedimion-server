<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 04.12.13
 * Time: 22:00
 */

namespace Likedimion\Service;


interface TranslationsHelperInterface {
    /**
     * @param string $line
     * @return string
     */
    public function getLine($line);
} 