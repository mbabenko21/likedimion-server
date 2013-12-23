<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:30
 */

namespace Likedimion\Database\Entity;

/**
 * Class Token
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\TokenRepositoryImpl")
 * @Table(name="tokens")
 */
class Token {

    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var string
     * @Column(name="value", type="string", unique=true)
     */
    protected $value;
    /**
     * @var \DateTime
     * @Column(name="end_date", type="datetime")
     */
    protected $endDate;
    /**
     * @var \DateTime
     * @Column(name="start_date", type="datetime")
     */
    protected $startDate;
    /**
     * @var Account
     * @OneToOne(targetEntity="Account")
     * @JoinColumn(name="account_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $account;

    public function __construct(){
        $this->setStartDate(new \DateTime());
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \Likedimion\Database\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param \Likedimion\Database\Entity\Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }
} 