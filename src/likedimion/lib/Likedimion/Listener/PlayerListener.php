<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 19:54
 */

namespace Likedimion\Listener;


use Likedimion\Events\LvlUpEvent;
use Likedimion\Events\PlayerEvent;
use Likedimion\Service\CalculatingService;
use Likedimion\Service\ExperienceService;
use Likedimion\Service\PlayerServiceInterface;

class PlayerListener {
    /** @var  PlayerServiceInterface */
    protected $playerService;
    /** @var  CalculatingService */
    protected $calculatingService;
    /** @var  ExperienceService */
    protected $expTableService;

    public function __construct(PlayerServiceInterface $playerService, CalculatingService $calculateService, ExperienceService $expTableService){
        $this->setCalculatingService($calculateService);
        $this->setExpTableService($expTableService);
        $this->setPlayerService($playerService);
    }
    /**
     * @param \Likedimion\Events\PlayerEvent $event
     */
    public function onLvlUp(PlayerEvent $event){
        $player = $event->getPlayer();
        //var_dump($this->playerService); exit;
        $this->calculatingService->calculate($player);
        $player->getCharParameters()->setNeedExperience($this->expTableService->getNeedExpForNextLevel($player));
        $this->playerService->getRepository()->save($player);
    }

    public function onAddExp(PlayerEvent $player){
        $player = $player->getPlayer();
        $this->playerService->getRepository()->save($player);
    }

    public function onAction(PlayerEvent $player){
        $player->getPlayer()->setLastActionTime(time());
        $this->playerService->getRepository()->save($player->getPlayer());
    }

    public function calculatePlayer(PlayerEvent $player){
        $this->calculatingService->calculate($player->getPlayer());
    }

    /**
     * @param \Likedimion\Service\PlayerServiceInterface $playerService
     */
    public function setPlayerService(PlayerServiceInterface $playerService)
    {
        $this->playerService = $playerService;
    }

    /**
     * @param \Likedimion\Service\CalculatingService $calculatingService
     */
    public function setCalculatingService(CalculatingService $calculatingService)
    {
        $this->calculatingService = $calculatingService;
    }

    /**
     * @param \Likedimion\Service\ExperienceService $expTableService
     */
    public function setExpTableService(ExperienceService $expTableService)
    {
        $this->expTableService = $expTableService;
    }

} 