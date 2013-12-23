<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 0:42
 */

namespace Likedimion\Database\Entity;

/**
 * Class Premium
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="premiums")
 */
class Premium {

    const SMALL_PREMIUM = 1;
    const MIDDLE_PREMIUM = 2;
    const FULL_PREMIUM = 3;

    /**
     * @var int
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var \DateTime
     * @Column(name="start_date", type="date")
     */
    protected $startDate;
    /**
     * @var \DateTime
     * @Column(name="end_date", type="date")
     */
    protected $endDate;
    /**
     * @var int
     * @Column(name="premium_type", type="integer")
     */
    protected $type;
    /**
     * @var Account
     *
     * @ManyToOne(targetEntity="Account", inversedBy="prems")
     */
    protected $account;
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
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