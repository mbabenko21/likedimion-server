<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 24.12.13
 * Time: 22:10
 */

namespace Likedimion\Tests;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Exception\AccountServiceException;
use Likedimion\Game;
use Likedimion\Service\AccountServiceInterface;

class AccountServiceImplTest extends  LikedimionTestCase {
    /** @var  AccountServiceInterface */
    protected $accountService;


    protected function setUp() {
        parent::setUp();
        $this->accountService = $this->game->get("account_service");

    }

    public function testGame() {
        parent::testGame();
        $this->assertInstanceOf('Likedimion\Service\AccountServiceInterface', $this->game->get("account_service"));
        $this->assertInstanceOf('Doctrine\ORM\EntityRepository', $this->accountService->getRepository());
    }

    public function testSetUpData() {
        $this->assertInternalType('string', $this->email);
        $this->assertInternalType('string', $this->password);
        $this->assertInternalType('string', $this->confirmPassword);
    }

    public function testServiceMetadata() {
        $this->assertEquals($this->entityAccountClass, $this->accountService->getRepository()->getClassName());
    }

    public function testIsAccount() {
        $repo = $this->accountService->getRepository();
        try{
            $account = $repo->findByEmail($this->email);
            $this->assertInstanceOf($this->entityAccountClass, $account);
            $repo->remove($account);
        } catch(EntityNotFoundException $e){
            $this->assertTrue(true);
        }
    }

    public function testRegistration() {
        try{
            $test = $this->accountService->registration($this->email, $this->password, $this->confirmPassword);
            $this->assertTrue($test);
        } catch(AccountServiceException $e){
            $this->fail($e->getMessage());
        }
    }

    public function testRepository() {
        $repo = $this->accountService->getRepository();
        try{
            $account = $repo->findByEmail($this->email);
            $this->assertInstanceOf($this->entityAccountClass, $account);
        } catch(EntityNotFoundException $e){
            $this->fail($e->getMessage());
        }
    }
}
 