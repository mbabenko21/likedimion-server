<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 05.12.13
 * Time: 0:07
 */

namespace Likedimion\Tools\Helper;


class AuthDataHelper {
    /** @var  string */
    protected $login;
    /** @var  string */
    protected $password;
    /** @var  bool */
    protected $rememberMe;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return boolean
     */
    public function getRememberMe()
    {
        return $this->rememberMe;
    }

    /**
     * @param boolean $rememberMe
     */
    public function setRememberMe($rememberMe)
    {
        $this->rememberMe = $rememberMe;
    }

} 