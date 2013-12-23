<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 0:20
 */

namespace Likedimion\Service;


use Doctrine\Common\Persistence\ObjectRepository;

interface AccountServiceInterface {
    /**
     * Проверка валидности пароля
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function verifyPassword($login, $password);

    /**
     * @return AccountRepositoryInterface|ObjectRepository
     */
    public function getRepository();

    /**
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @internal param string $login
     * @return bool
     */
    public function registration($email, $password, $confirmPassword = "");
} 