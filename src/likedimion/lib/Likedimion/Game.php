<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 20:35
 */

namespace Likedimion;


use Likedimion\Common\StringCommon;
use Likedimion\Database\Entity\Account;
use Likedimion\Database\Entity\Token;
use Likedimion\Kernel\DoctrineBootstrap;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Game
{
    const DEVELOPMENT_MODE = "development";
    const PRODUCTION_MODE = "production";
    const TEST_MODE = "test";

    protected static $_instance = null;

    /** @var  ContainerBuilder */
    protected $_container;
    /** @var  array */
    protected $_bootstrap;
    /** @var  array */
    protected $_config;
    /** @var null|Token */
    protected $_authToken = null;

    public function __construct()
    {
        $container = new ContainerBuilder();
        $this->_container = $container;
    }

    protected function loadFiles(YamlFileLoader $loader){
        $servicesDir = StringCommon::replaceKeyWords($this->_config["app"]["services_dir"]);
        $files = scandir($servicesDir);
        foreach($files as $file){
            if($file != "." and $file != ".."){
                $loader->load($file);
            }
        }
        return $loader;
    }


    public function play()
    {
        $this->_bootstrap();
        $servicesDir = StringCommon::replaceKeyWords($this->_config["app"]["services_dir"]);
        $loader = new YamlFileLoader($this->_container, new FileLocator($servicesDir));
        $loader = $this->loadFiles($loader);
    }

    /**
     * @return Game
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function _bootstrap() {
        $this->_bootstrap = array(
            new DoctrineBootstrap($this->_config)
        );
    }

    public function getVersion() {
        return $this->_config["app"]["version"];
    }

    public function getApplicationMode() {
        return $this->_config["app"]["mode"];
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    public function getContainer()
    {
        return $this->_container;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->_config = $config;
    }

    /**
     * @return \Likedimion\Database\Entity\Token|null
     */
    public function getAuthToken()
    {
        return $this->_authToken;
    }

    /**
     * @param \Likedimion\Database\Entity\Token|null $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->_authToken = $authToken;
    }

    /**
     * @param $id
     * @return object
     */
    public function get($id){
        return $this->getContainer()->get($id);
    }
} 