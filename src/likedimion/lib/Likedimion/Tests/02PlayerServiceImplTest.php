<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 25.12.13
 * Time: 22:29
 */

namespace Likedimion\Tests;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Player;
use Likedimion\Exception\RegistrationException;
use Likedimion\Service\AccountServiceInterface;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\PlayerRegistrationServiceInterface;
use Likedimion\Service\PlayerServiceInterface;
use Likedimion\Tools\Helper\PlayerDataHelper;

class PlayerServiceImplTest extends LikedimionTestCase {
    /** @var  PlayerServiceInterface */
    protected $playerService;
    /** @var  PlayerRegistrationServiceInterface */
    protected $playerRegistrationService;
    /** @var  AccountServiceInterface */
    protected $accountService;
    /** @var  AuthServiceInterface */
    protected $authService;

    protected $tokenEntityClass;

    /** @var  PlayerDataHelper */
    protected $playerData;
    protected $entityClass;
    protected function setUp(){
        parent::setUp();
        $this->playerService = $this->game->get("player_service");
        $this->playerRegistrationService = $this->game->get("player_registration_service");
        $this->accountService = $this->game->get("account_service");
        $this->authService = $this->game->get("auth_service");
        $playerData = new PlayerDataHelper();
        $playerData->name = "11qq22ww";
        $playerData->class = Player::WARRIOR;
        $playerData->race = Player::DARK_ELVEN;
        $playerData->sex = Player::MALE;
        $this->playerData = $playerData;
        $this->entityClass = "Likedimion\\Database\\Entity\\Player";
        $this->tokenEntityClass = "Likedimion\\Database\\Entity\\Token";
    }

    public function testAccount() {
        try{
            $account = $this->accountService->getRepository()->findByEmail($this->email);
            $this->assertInstanceOf($this->entityAccountClass, $account);
        } catch(EntityNotFoundException $e){
            $this->fail($e->getMessage());
        }
    }

    public function testAuth() {
        $token = $this->authService->login($this->email, $this->password);
        $this->assertInstanceOf($this->tokenEntityClass, $token);
    }

    public function testCreatePlayer() {
        try{
            $token = $this->authService->login($this->email, $this->password);
            $this->game->setAuthToken($token);
            $player = $this->playerRegistrationService->createPlayer($this->playerData);
            $this->assertInstanceOf($this->entityClass, $player);
            $this->playerService->getRepository()->remove($player);
        } catch(RegistrationException $e){
            $this->fail($e->getMessage());
        }
    }
}
 