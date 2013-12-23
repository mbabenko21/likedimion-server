<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 17:30
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Token;

interface TokenRepositoryInterface {
    /**
     * @param string $value
     * @return Token
     */
    public function getTokenByValue($value);

    /**
     * @param Token $token
     * @return Token
     */
    public function save(Token $token);

    /**
     * @param Token $token
     * @return void
     */
    public function remove(Token $token);
} 