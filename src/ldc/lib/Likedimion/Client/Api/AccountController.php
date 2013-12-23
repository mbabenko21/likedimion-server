<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 20.12.13
 * Time: 0:50
 */

namespace Likedimion\Client\Api;


use Likedimion\Client\Controller\BaseController;
use Likedimion\Database\Entity\Player;
use Likedimion\Exception\LikedimionErrors;
use Likedimion\Service\PlayerServiceInterface;
use Likedimion\Tools\Helper\ResponseHelper;

class AccountController extends BaseController {
    /** @var  PlayerServiceInterface */
    protected $playerService;

    public function playersGetAction(){
        $responseHelper = new ResponseHelper();
        $tokenValue = $this->getRequest()->get("token", null);
        if(true === $this->getTokenService()->isValid($tokenValue)){
            $token = $this->getTokenService()->getRepository()->getTokenByValue($tokenValue);
            $account = $token->getAccount();
            $responseHelper->is_good = true;
            /** @var $player Player */
            foreach($account->getPlayers() as $player){
                $responseHelper->response[] = $this->playerService->export($player);
            }
            $responseHelper->errors = array();
        } else {
            $responseHelper->is_good = false;
            $responseHelper->response = array();
            $responseHelper->errors = array(LikedimionErrors::INVALID_TOKEN);
        }
        $this->getResponse()->setData($responseHelper->toArray());
        $this->getResponse()->send();
    }

    protected function preLoad(){
        parent::preLoad();
        $this->playerService = $this->get("player_service");
    }
} 