<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 0:20
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Account;
use Likedimion\Exception\AccountServiceException;
use Likedimion\Service\AccountRepositoryInterface;
use Likedimion\Service\AccountServiceInterface;

class AccountServiceImpl implements AccountServiceInterface {
    /** @var  EntityManager */
    protected $em;
    /** @var  string */
    protected $entityClass;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * Проверка валидности пароля
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function verifyPassword($login, $password)
    {
        try{
            $account = $this->getRepository()->findByLogin($login);
            if(password_verify($password, $account->getPassword())){
                return true;
            }  else {
                return false;
            }
        } catch(EntityNotFoundException $e){
            return false;
        }
    }

    /**
     * @return AccountRepositoryInterface
     */
    public function getRepository()
    {
        return $this->em->getRepository($this->entityClass);
    }

    /**
     * @param string $entityClass
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @throws \Likedimion\Exception\AccountServiceException
     * @internal param string $login
     * @return bool
     */
    public function registration($email, $password, $confirmPassword = "")
    {
        if($password == $confirmPassword) {
            $account = new Account();
            $account->setLogin($email);
            $account->setPassword($password);
            $account->setEmail($email);
            try{
                $findAccount = $this->getRepository()->findByLogin($email);
                $findAccountEmail = $this->getRepository()->findByEmail($email);
                throw new AccountServiceException("login_already_exists");
            } catch(EntityNotFoundException $e) {
                $this->getRepository()->save($account);
                return true;
            }
        } else {
            throw new AccountServiceException("passwords_not_confirm");
        }
    }

    /**
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }
}