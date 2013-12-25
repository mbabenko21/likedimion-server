<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:55
 */

namespace Likedimion\Tools;


use Likedimion\Common\StringCommon;
use Likedimion\Database\Entity\Player;
use Likedimion\Service\ExperienceService;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\Yaml\Yaml;

class ExpTableServiceImpl implements ExperienceService
{

    public function getNeedExpForNextLevel(Player $player)
    {
        $cl = $player->getCharParameters()->getLevel();
        if ($cl < 11) {
            $needExp = 40 * pow($cl, 2) + 360 * $cl;
        } elseif ($cl >= 11 and $cl < 30) {
            $needExp = -0.4 * pow($cl, 3) + 40.4 * pow($cl, 2) + 396 * $cl;
        } elseif($cl >= 30 and $cl < 60){
            //(65x 2 - 165x - 6750) × 0,82
            $needExp = (65 * pow($cl, 2) - 165 * $cl -6750) * 0.82;
        } elseif($cl >= 61 and $cl < 69) {
            //580 + (5 × CL)
            //155 + MXP (CL) х (1344 - ((69-CL) * (3 + (69-CL) * 4)))
            $needExp = 155 + 580 + (5*$cl)*(1344-((69-$cl)*(3+(69-$cl)*4)));
        } elseif($cl >= 70 and $cl < 80) {
            //580 + (5 × CL)
            //155 + MXP (CL) х (1344 - ((69-CL) * (3 + (69-CL) * 4)))
            $needExp = 155 + 1878 + (5*$cl)*(1990-((89-$cl)*(3+(89-$cl)*5)));
        } elseif($cl >= 80 and $cl < 100) {
            //155 + 3517 + (5*83)*(3820-((99-83)*(3+(99-83)*5)))
            $needExp = 155 + 3517 + (5 * $cl)*(3829-((100-$cl)*(3+(100-$cl)*5)));
        } else {
            $needExp = 155 + 3517 + (5 * $cl)*(3829-((100-$cl)*(3+(100-$cl)*5)));
        }
        return $needExp;
    }

    /**
     * @param array $expTable
     */
    public function setExpTable($expTable)
    {
        $this->expTable = $expTable;
    }
}