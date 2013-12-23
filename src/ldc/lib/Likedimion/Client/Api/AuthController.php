<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 15.12.13
 * Time: 19:36
 */

namespace Likedimion\Client\Api;


use Likedimion\Client\Controller\BaseController;
use Likedimion\Database\Entity\Token;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\TokenServiceInterface;
use Likedimion\Tools\Helper\AuthDataHelper;
use Likedimion\Tools\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{
    /** @var  AuthServiceInterface */
    protected $authService;
    /** @var  TokenServiceInterface */
    protected $tokenService;

    public function accountAuthAction(Request $req, Response $res)
    {
        $response = new ResponseHelper();
        $token = $this->authService->login($req->request->get("email"), $req->request->get("password"), $req->request->get("remember_me"));
        if ($token instanceof Token) {
            $response->is_good = true;
            $response->response["token"] = $token->getValue();
            $response->response["end_date"] = $token->getEndDate();
        } else {
            $response->is_good = false;
        }
        $res->setData($response);
        $res->send();
    }

    public function isLoginAction(Request $req, Response $res){
        $responseData = new ResponseHelper();
        $token = $req->request->get("token");
        if($token) {
            $responseData->is_good = $this->authService->isLogin($token);
        } else {
            $responseData->is_good = false;
        }
        $res->setData($responseData);
        $res->send();
    }

    /**
     * @return \Likedimion\Service\AuthServiceInterface
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    protected function preLoad()
    {
        $this->authService = $this->get("auth_service");
        $this->tokenService = $this->get("token_service");
    }
} 