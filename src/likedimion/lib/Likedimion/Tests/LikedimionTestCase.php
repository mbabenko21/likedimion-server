<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 24.12.13
 * Time: 22:11
 */

namespace Likedimion\Tests;


use Likedimion\Game;
use Likedimion\Service\TokenServiceInterface;

class LikedimionTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var  Game */
    protected $game;
    /** @var  TokenServiceInterface */
    protected $tokenService;

    protected $email, $password, $confirmPassword, $entityAccountClass;

    protected function setUp()
    {
        $this->game = Game::getInstance();
        $this->tokenService = $this->game->get("token_service");

        $this->email = "tester@tester.com";
        $this->password = "123123";
        $this->confirmPassword = "123123";
        $this->entityAccountClass = "Likedimion\\Database\\Entity\\Account";
    }

    public function testGame()
    {
        $this->assertInstanceOf('Likedimion\\Game', $this->game);
        $this->assertInstanceOf('Symfony\Component\DependencyInjection\ContainerBuilder', $this->game->getContainer());
        $this->assertInstanceOf('Doctrine\ORM\EntityManager', $this->game->get("entity_manager"));
        $this->assertTrue(is_array($this->game->getConfig()));
    }
} 