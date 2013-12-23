<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 17:24
 */

namespace Likedimion\Database\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Account;
use Likedimion\Service\AccountRepositoryInterface;

/**
 * Class AccountRepositoryImpl
 * @package Likedimion\Database\Repository
 */
class AccountRepositoryImpl extends EntityRepository implements AccountRepositoryInterface  {

    /**
     * @param string $login
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Account
     */
    public function findByLogin($login)
    {
        $account = $this->findOneBy(array("login" => $login));
        if($account instanceof Account === false){
            throw new EntityNotFoundException();
        }
        return $account;
    }

    /**
     * @param string $email
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Account
     */
    public function findByEmail($email)
    {
        $account = $this->findOneBy(array("email" => $email));
        if($account instanceof Account === false){
            throw new EntityNotFoundException();
        }
        return $account;
    }

    /**
     * @param Account $account
     * @return Account
     */
    public function save(Account $account)
    {
        $this->_em->persist($account);
        $this->_em->flush();
    }

    /**
     * @param Account $account
     * @return void
     */
    public function remove(Account $account)
    {
        $this->_em->remove($account);
    }
}