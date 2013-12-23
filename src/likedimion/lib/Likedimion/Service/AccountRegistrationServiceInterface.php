<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 04.12.13
 * Time: 11:23
 */

namespace Likedimion\Service;


interface AccountRegistrationServiceInterface {
    public function registration($login, $password, $confirmation);
} 