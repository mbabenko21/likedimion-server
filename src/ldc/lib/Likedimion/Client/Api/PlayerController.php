<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 15.12.13
 * Time: 20:06
 */

namespace Likedimion\Client\Api;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Client\Controller\BaseController;
use Likedimion\Exception\RegistrationException;
use Likedimion\Game;
use Likedimion\Service\PlayerRegistrationServiceInterface;
use Likedimion\Service\PlayerServiceInterface;
use Likedimion\Tools\Helper\PlayerDataHelper;
use Likedimion\Tools\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends AuthController
{
    /** @var  PlayerServiceInterface */
    protected $playerService;
    /** @var  PlayerRegistrationServiceInterface */
    protected $playerCreateService;

    /**
     * @param Request $req
     * @param Response|JsonResponse $res
     */
    public function createAction(Request $req, $res)
    {
        $responseData = new ResponseHelper();
        $token = $req->request->get("token", null);
        $name = $req->request->get("name", null);
        $class = $req->request->get("class", 1);
        $sex = $req->request->get("sex", 1);
        $race = $req->request->get("sex", 1);
        if (!is_null($token)) {
            try {
                $account = $this->getAuthService()->getAccount($token);
                Game::getInstance()->setAuthToken($account->getAuthToken());
                $playerData = new PlayerDataHelper();
                $playerData->name = $name;
                $playerData->class = $class;
                $playerData->race = $race;
                $playerData->sex = $sex;
                $player = $this->playerCreateService->createPlayer($playerData);
                $responseData->is_good = true;
                $responseData->response["player"] = $this->serialize($player);
            } catch (RegistrationException $e) {
                $responseData->is_good = false;
                $responseData->errors[] = $e->getMessage();
            } catch (EntityNotFoundException $e) {
                $responseData->is_good = false;
                $responseData->errors[] = $e->getMessage();
            }
        } else {
            $responseData->is_good = false;
            $responseData->errors[] = "token not found";
        }
        $res->setData($responseData);
        $res->send();
    }

    protected function preLoad()
    {
        parent::preLoad();
        $this->playerService = $this->get("player_service");
        $this->playerCreateService = $this->get("player_registration_service");

    }
} 