<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 17:22
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Account;

interface AccountRepositoryInterface {
    /**
     * @param string $login
     * @return Account
     */
    public function findByLogin($login);
    /**
     * @param string $email
     * @return Account
     */
    public function findByEmail($email);

    /**
     * @param Account $account
     * @return Account
     */
    public function save(Account $account);

    /**
     * @param Account $account
     * @return void
     */
    public function remove(Account $account);
} 