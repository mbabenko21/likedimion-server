<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 21:31
 */

namespace Likedimion\Common;


class StringCommon {

    protected static $_keyWords = array(
        "@ROOT_DIR" => ROOT_DIR,
        "@SRC_DIR" => SRC_DIR,
        "@RES_DIR" => RES_DIR
    );

    /**
     * @param $string
     * @return string
     */
    public static function replaceKeyWords($string){
        $string = str_replace(
            array_keys(self::$_keyWords),
            array_values(self::$_keyWords),
            $string
        );
        return $string;
    }

} 