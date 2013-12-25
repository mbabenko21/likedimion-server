<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 25.12.13
 * Time: 23:22
 */

namespace Likedimion\Tests;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Service\AccountServiceInterface;
use Likedimion\Service\PlayerServiceInterface;

class CloseTest extends LikedimionTestCase
{
    /** @var  AccountServiceInterface */
    protected $accountService;
    /** @var  PlayerServiceInterface */
    protected $playerService;

    protected function setUp()
    {
        parent::setUp();
        $this->accountService = $this->game->get("account_service");
        $this->playerService = $this->game->get("player_service");
    }

    public function testAccount()
    {
        try {
            $account = $this->accountService->getRepository()->findByEmail($this->email);
            $this->assertInstanceOf($this->entityAccountClass, $account);
        } catch (EntityNotFoundException $e) {
            $this->fail($e->getMessage());
        }
    }

    public function testRemoveAccount()
    {
        try {
            $account = $this->accountService->getRepository()->findByEmail($this->email);
            $this->assertInstanceOf($this->entityAccountClass, $account);
            $this->accountService->getRepository()->remove($account);
        } catch (EntityNotFoundException $e) {
            $this->assertTrue(true);
        }
    }
}
 