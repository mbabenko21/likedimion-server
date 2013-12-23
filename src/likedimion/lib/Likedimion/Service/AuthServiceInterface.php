<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:45
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Token;

interface AuthServiceInterface {
    /**
     * @param string $login
     * @param string $password
     * @param bool $rememberMe
     * @return Token
     */
    public function login($login, $password, $rememberMe = true);

    /**
     * @param string $tokenValue
     * @return bool
     */
    public function isLogin($tokenValue);

    /**
     * @param string $tokenValue
     * @return bool
     */
    public function logout($tokenValue);

    /**
     * @param string $tokenValue
     * @return Account
     */
    public function getAccount($tokenValue);

} 