<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 23:02
 */

namespace Likedimion\Tools\Calculating;


use Likedimion\Database\Entity\Player;
use Likedimion\Service\CalculatingService;

class PlayerCalculatingService implements CalculatingService {
    /**
     * @param Player $object
     * @return mixed
     */
    public function calculate($object)
    {
        $stats = $object->getStats();
        $charParameters = $object->getCharParameters();
        $warParameters = $object->getWar();

        $maxLife = ( $stats->getEndurance() + $stats->getStrenge() ) * 10 + 10 * $charParameters->getLevel();
        $maxMana = $stats->getIntelligence() * 10 + 10 * $charParameters->getLevel();

        $charParameters->setMaxLife($maxLife);
        $charParameters->setMaxMana($maxMana);

        if($charParameters->getLife() === null){
            $charParameters->setLife($charParameters->getMaxLife());
        }

        if($charParameters->getMana() === null) {
            $charParameters->setMana($charParameters->getMaxMana());
        }

        $object->setCharParameters($charParameters);
    }
}