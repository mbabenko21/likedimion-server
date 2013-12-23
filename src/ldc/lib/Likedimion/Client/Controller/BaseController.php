<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 15.12.13
 * Time: 13:05
 */

namespace Likedimion\Client\Controller;


use Likedimion\Database\Entity\Token;
use Likedimion\Game;
use Likedimion\Service\TokenServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseController
{
    /** @var  Request */
    protected $request;
    /** @var  Response */
    protected $response;
    /** @var  TokenServiceInterface */
    protected $tokenService;

    public function __construct(){
        $this->preLoad();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return \Likedimion\Service\TokenServiceInterface
     */
    public function getTokenService()
    {
        return $this->tokenService;
    }

    /**
     * @param \Likedimion\Service\TokenServiceInterface $tokenService
     */
    public function setTokenService($tokenService)
    {
        $this->tokenService = $tokenService;
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected function getContainer()
    {
        return Game::getInstance()->getContainer();
    }

    /**
     * @return \Likedimion\Database\Entity\Account|null
     */
    protected function getAccount()
    {
        $token = Game::getInstance()->getAuthToken();
        if ($token instanceof Token) {
            $account = $token->getAccount();
        } else {
            $account = null;
        }
        return $account;
    }

    /**
     * @return Serializer
     */
    protected function getSerializer()
    {
        $normalizers = array(new GetSetMethodNormalizer());
        $serializers = array("xml" => new XmlEncoder(), "json" => new JsonEncoder());
        $serializer = new Serializer($normalizers, $serializers);
        return $serializer;
    }

    /**
     * @param $data
     * @return string|\Symfony\Component\Serializer\Encoder\scalar
     */
    protected function serialize($data)
    {
        $cfg = Game::getInstance()->getConfig();
        return $this->getSerializer()->serialize($data, $cfg["app"]["serialize_format"]);
    }

    protected function get($id){
        return $this->getContainer()->get($id);
    }

    /*protected function desirealize($data)
    {
        $cfg = Game::getInstance()->getConfig();
        return $this->getSerializer()->deserialize($data)
    }*/

    protected function preLoad(){
        $this->setTokenService($this->get("token_service"));
    }
} 