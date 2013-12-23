<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 15.12.13
 * Time: 18:09
 */

namespace Likedimion\Client\Api;


use Exception;
use Likedimion\Client\Controller\BaseController;
use Likedimion\Exception\AccountServiceException;
use Likedimion\Service\AccountRegistrationServiceInterface;
use Likedimion\Tools\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;

class RegistrationController extends BaseController {
    /**
     * email: Email
     * password: Password
     * password_confirm: Password Confirmaition
     * @param Request $req
     * @param JsonResponse $res
     */
    public function accountRegistrationAction(Request $req, JsonResponse $res){
        /** @var $accountService AccountRegistrationServiceInterface */
        $accountService = $this->getContainer()->get("account_service");
        $response = new ResponseHelper();
        try{
            $accountService->registration($req->request->get("email"), $req->request->get("password"), $req->request->get("password_confirm"));
            $response->is_good = true;
        } catch(Exception $e){
            $response->is_good = false;
            $response->errors[] = $e->getMessage();
        }
        $res->setData($response);
        $res->send();
    }

} 