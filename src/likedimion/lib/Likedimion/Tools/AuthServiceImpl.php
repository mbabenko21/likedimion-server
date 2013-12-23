<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:00
 */

namespace Likedimion\Tools;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Token;
use Likedimion\Game;
use Likedimion\Service\AccountServiceInterface;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\TokenServiceInterface;

class AuthServiceImpl implements AuthServiceInterface
{
    /** @var  AccountServiceInterface */
    protected $accountService;
    /** @var  TokenServiceInterface */
    protected $tokenService;

    /**
     * @param string $login
     * @param string $password
     * @param bool $rememberMe
     * @return Token
     */
    public function login($login, $password, $rememberMe = true)
    {
        try {
            $account = $this->accountService->getRepository()->findByLogin($login);
            if ($rememberMe === true) {
                $config = Game::getInstance()->getConfig();
                $rememberDays = $config["app"]["remember_days"];
                $endTime = time() + 3600 * 24 * $rememberDays;
            } else {
                $endTime = time() + 600;
            }
            $endDate = new \DateTime();
            $endDate->setTimestamp($endTime);
            if (is_null($account->getAuthToken())) {
                $token = $this->tokenService->generateToken($account, $endDate);
                $account->setAuthToken($token);
            } elseif(!$this->tokenService->isValid($account->getAuthToken()->getValue())) {
                $token = $this->tokenService->generateToken($account, $endDate);
                $account->setAuthToken($token);
            }
            $this->accountService->getRepository()->save($account);
            return $account->getAuthToken();
        } catch (EntityNotFoundException $e) {
            return false;
        }
    }

    /**
     * @param string $tokenValue
     * @return bool
     */
    public function isLogin($tokenValue)
    {
        return $this->tokenService->isValid($tokenValue);
    }

    /**
     * @param \Likedimion\Service\AccountServiceInterface $accountService
     */
    public function setAccountService($accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param \Likedimion\Service\TokenServiceInterface $tokenService
     */
    public function setTokenService($tokenService)
    {
        $this->tokenService = $tokenService;
    }

    /**
     * @param string $tokenValue
     * @return Account
     */
    public function getAccount($tokenValue)
    {
        $token = $this->tokenService->getRepository()->getTokenByValue($tokenValue);
        return $token->getAccount();
    }

    /**
     * @param string $tokenValue
     * @return bool
     */
    public function logout($tokenValue)
    {
        $token = $this->tokenService->getRepository()->getTokenByValue($tokenValue);
        $this->tokenService->getRepository()->remove($token);
    }
}