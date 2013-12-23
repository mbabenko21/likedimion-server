<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:02
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Token;
use Likedimion\Service\TokenRepositoryInterface;
use Likedimion\Service\TokenServiceInterface;

class TokenServiceImpl implements TokenServiceInterface {
    /** @var  EntityManager */
    protected $em;
    /** @var  string */
    protected $entityClass;

    /**
     * @param \Likedimion\Database\Entity\Account $account
     * @param \DateTime $endDate
     * @return Token
     */
    public function generateToken(Account $account, \DateTime $endDate)
    {
        $tokenValue = $account->getLogin()."_".$account->getPassword()."_".rand(0,99999999999);
        $token = new Token();
        $token->setValue(md5($tokenValue));
        $token->setEndDate($endDate);

        $this->getRepository()->save($token);
        return $token;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return TokenRepositoryInterface
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
     * @param string $tokenValue
     * @return bool
     */
    public function isValid($tokenValue)
    {
        try{
            $token = $this->getRepository()->getTokenByValue($tokenValue);
            $endTime = $token->getEndDate()->getTimestamp();
            if($endTime > time()) {
                $this->getRepository()->remove($token);
                return false;
            } else {
                return true;
            }
        } catch(EntityNotFoundException $e){
            return false;
        }
    }
}