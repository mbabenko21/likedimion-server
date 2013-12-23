<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 20:43
 */

namespace Likedimion\Kernel;


use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Likedimion\Common\StringCommon;
use Likedimion\Game;
use Symfony\Component\Yaml\Yaml;

class DoctrineBootstrap {
    public function __construct($config) {
        if(isset($config["doctrine"])){
            $dbParams = $config["doctrine"]["db_params"];
            $paths = StringCommon::replaceKeyWords($config["doctrine"]["entity_paths"]);
            $isDevMode = $config["doctrine"]["is_dev_mode"];
            $proxyDir = StringCommon::replaceKeyWords($config["doctrine"]["proxy_dir"]);
            $proxyNamespace = $config["doctrine"]["proxy_namespace"];
            $applicationMode = Game::getInstance()->getApplicationMode();
            if ($applicationMode == Game::DEVELOPMENT_MODE) {
                $cache = new \Doctrine\Common\Cache\ArrayCache;
            } else {
                $cache = new \Doctrine\Common\Cache\ApcCache;
            }
            $doctrineConfig = new Configuration;
            $doctrineConfig->setMetadataCacheImpl($cache);
            $driverImpl = $doctrineConfig->newDefaultAnnotationDriver($paths);
            $doctrineConfig->setMetadataDriverImpl($driverImpl);
            $doctrineConfig->setQueryCacheImpl($cache);
            $doctrineConfig->setProxyDir($proxyDir);
            $doctrineConfig->setProxyNamespace($proxyNamespace);

            if ($applicationMode == Game::DEVELOPMENT_MODE) {
                $doctrineConfig->setAutoGenerateProxyClasses(true);
            } else {
                $doctrineConfig->setAutoGenerateProxyClasses(false);
            }

            $entityManager = EntityManager::create($dbParams, $doctrineConfig);
            Game::getInstance()->getContainer()->set("entity_manager", $entityManager);
        } else {
            throw new \RuntimeException("You need add Doctrine config in your res/config.yml");
        }
    }
} 