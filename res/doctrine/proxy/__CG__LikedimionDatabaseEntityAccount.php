<?php

namespace Likedimion\Proxies\__CG__\Likedimion\Database\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Account extends \Likedimion\Database\Entity\Account implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'login', 'password', 'email', 'prems', 'players', 'authToken', 'currentPlayer', 'createdDate');
        }

        return array('__isInitialized__', 'id', 'login', 'password', 'email', 'prems', 'players', 'authToken', 'currentPlayer', 'createdDate');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Account $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLogin', array());

        return parent::getLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setLogin($login)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLogin', array($login));

        return parent::setLogin($login);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getPremiums()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPremiums', array());

        return parent::getPremiums();
    }

    /**
     * {@inheritDoc}
     */
    public function addPremium(\Likedimion\Database\Entity\Premium $premium)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPremium', array($premium));

        return parent::addPremium($premium);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlayers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlayers', array());

        return parent::getPlayers();
    }

    /**
     * {@inheritDoc}
     */
    public function addPlayer(\Likedimion\Database\Entity\Player $player)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlayer', array($player));

        return parent::addPlayer($player);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthToken', array());

        return parent::getAuthToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthToken($authToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAuthToken', array($authToken));

        return parent::setAuthToken($authToken);
    }

    /**
     * {@inheritDoc}
     */
    public function unsetAuthToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'unsetAuthToken', array());

        return parent::unsetAuthToken();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedDate', array());

        return parent::getCreatedDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDate($createdDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDate', array($createdDate));

        return parent::setCreatedDate($createdDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentPlayer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentPlayer', array());

        return parent::getCurrentPlayer();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentPlayer($currentPlayer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentPlayer', array($currentPlayer));

        return parent::setCurrentPlayer($currentPlayer);
    }

    /**
     * {@inheritDoc}
     */
    public function validateAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'validateAccount', array());

        return parent::validateAccount();
    }

}
