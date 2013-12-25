<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 22:03
 */

namespace Likedimion\Database\Entity;
use Doctrine\Common\Annotations;
use Doctrine\Common\Collections\ArrayCollection;
use Likedimion\Exception\ValidationException;

/**
 * Class Account
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\AccountRepositoryImpl")
 * @Table(name="accounts")
 * @HasLifecycleCallbacks
 */
class Account {
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(name="login", type="string", unique=true)
     */
    protected $login;
    /**
     * @var string
     * @Column(name="password", type="string")
     */
    protected $password;
    /**
     * @var string
     * @Column(name="email", type="string", nullable=true, unique=true)
     */
    protected $email;
    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="Premium", mappedBy="account", cascade={"persist", "remove", "merge"})
     */
    protected $prems;
    /**
     * @var ArrayCollection
     *
     * @ManyToMany(targetEntity="Player", inversedBy="id", cascade={"persist", "remove"})
     * @JoinTable(name="account_players",
     *      joinColumns={@JoinColumn(name="account_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="player_id", referencedColumnName="id")}
     *      )
     */
    protected $players;
    /**
     * @var Token
     * @OneToOne(targetEntity="Token")
     * @JoinColumn(name="token_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $authToken;
    /**
     * @var Player
     * @OneToOne(targetEntity="Player")
     * @JoinColumn(name="current_player_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $currentPlayer;

    /**
     * @var \DateTime
     * @Column(type="datetime", name="create_date")
     */
    protected $createdDate;

    public function __construct(){
        $this->setCreatedDate(new \DateTime("now"));
        $this->players = new ArrayCollection();
    }
    /** @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPremiums()
    {
        return $this->prems;
    }

    public function addPremium(Premium $premium){
        $this->prems->add($premium);
        $premium->setAccount($this);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    public function addPlayer(Player $player){
        $this->players->add($player);
        $player->setAccount($this);
    }

    /**
     * @return \Likedimion\Database\Entity\Token
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param \Likedimion\Database\Entity\Token $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
        $authToken->setAccount($this);
    }

    public function unsetAuthToken() {
        $this->authToken = null;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \Likedimion\Database\Entity\Player
     */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * @param \Likedimion\Database\Entity\Player $currentPlayer
     */
    public function setCurrentPlayer($currentPlayer)
    {
        $this->currentPlayer = $currentPlayer;
    }

    /**
     * @PrePersist @PreUpdate
     */
    public function validateAccount() {
       $match = "/^[a-zA-Z0-9.!#$%&'*+\/\=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";
       if(!preg_match($match, $this->login)){
           throw new ValidationException("login_not_valid");
       }
    }

} 