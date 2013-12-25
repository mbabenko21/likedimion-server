<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 26.12.13
 * Time: 1:37
 */

namespace Likedimion\Client\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends BaseController {
    public function indexAction(Request $req, Response $res){
        $req->request;
        $res->send("Likedimion Server");
    }
} 