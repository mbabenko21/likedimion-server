<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:53
 */

namespace Likedimion\Service;


use DateTime;
use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Token;

interface TokenServiceInterface {
    /**
     * @param \Likedimion\Database\Entity\Account $account
     * @param DateTime $endDate
     * @return Token
     */
    public function generateToken(Account $account, DateTime $endDate);

    /**
     * @param string $tokenValue
     * @return bool
     */
    public function isValid($tokenValue);

    /**
     * @return TokenRepositoryInterface
     */
    public function getRepository();

} 