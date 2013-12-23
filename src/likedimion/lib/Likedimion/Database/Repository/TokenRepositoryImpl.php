<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 17:33
 */

namespace Likedimion\Database\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Token;
use Likedimion\Service\TokenRepositoryInterface;

class TokenRepositoryImpl extends EntityRepository implements TokenRepositoryInterface {

    /**
     * @param string $value
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Token
     */
    public function getTokenByValue($value)
    {
        $token = $this->findOneBy(array("value" => $value));
        if($token instanceof Token === false){
            throw new EntityNotFoundException();
        }
        return $token;
    }

    /**
     * @param Token $token
     * @return Token
     */
    public function save(Token $token)
    {
        $this->_em->persist($token);
        $this->_em->flush();
    }

    /**
     * @param Token $token
     * @return void
     */
    public function remove(Token $token)
    {
        $this->_em->remove($token);
    }
}