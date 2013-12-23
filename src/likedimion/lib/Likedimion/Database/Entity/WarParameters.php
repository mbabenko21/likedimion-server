<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 06.12.13
 * Time: 22:02
 */

namespace Likedimion\Database\Entity;

/**
 * Class WarParameters
 * @package Likedimion\Database\Entity
 *
 * @MappedSuperClass
 */
class WarParameters {
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var integer
     * @Column(name="p_hit", type="integer")
     */
    protected $pHit = 0;
    /**
     * @var integer
     * @Column(name="m_hit", type="integer")
     */
    protected $mHit = 0;
    /**
     * @var integer
     * @Column(name="p_min_damage", type="integer")
     */
    protected $pMinDamage  = 0;
    /**
     * @var integer
     * @Column(name="m_min_damage", type="integer")
     */
    protected $mMinDamage = 0;
    /**
     * @var integer
     * @Column(name="p_max_damage", type="integer")
     */
    protected $pMaxDamage = 0;
    /**
     * @var integer
     * @Column(name="m_max_damage", type="integer")
     */
    protected $mMaxDamage = 0;
    /**
     * @var integer
     * @Column(name="p_def", type="integer")
     */
    protected $pDef = 0;
    /**
     * @var integer
     * @Column(name="m_def", type="integer")
     */
    protected $mDef = 0;
    /**
     * @var integer
     * @Column(name="p_shield", type="integer")
     */
    protected $pShield = 0;
    /**
     * @var integer
     * @Column(name="m_shield", type="integer")
     */
    protected $mShield = 0;
    /**
     * @var integer
     * @Column(name="p_bias", type="integer")
     */
    protected $pBias = 0;
    /**
     * @var integer
     * @Column(name="m_bias", type="integer")
     */
    protected $mBias = 0;
    /**
     * @var integer
     * @Column(name="p_crit", type="integer")
     */
    protected $pCrit = 0;
    /**
     * @var integer
     * @Column(name="m_crit", type="integer")
     */
    protected $mCrit = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPHit()
    {
        return $this->pHit;
    }

    /**
     * @param int $pHit
     */
    public function setPHit($pHit)
    {
        $this->pHit = $pHit;
    }

    /**
     * @return int
     */
    public function getMHit()
    {
        return $this->mHit;
    }

    /**
     * @param int $mHit
     */
    public function setMHit($mHit)
    {
        $this->mHit = $mHit;
    }

    /**
     * @return int
     */
    public function getPMinDamage()
    {
        return $this->pMinDamage;
    }

    /**
     * @param int $pMinDamage
     */
    public function setPMinDamage($pMinDamage)
    {
        $this->pMinDamage = $pMinDamage;
    }

    /**
     * @return int
     */
    public function getMMinDamage()
    {
        return $this->mMinDamage;
    }

    /**
     * @param int $mMinDamage
     */
    public function setMMinDamage($mMinDamage)
    {
        $this->mMinDamage = $mMinDamage;
    }

    /**
     * @return int
     */
    public function getPMaxDamage()
    {
        return $this->pMaxDamage;
    }

    /**
     * @param int $pMaxDamage
     */
    public function setPMaxDamage($pMaxDamage)
    {
        $this->pMaxDamage = $pMaxDamage;
    }

    /**
     * @return int
     */
    public function getMMaxDamage()
    {
        return $this->mMaxDamage;
    }

    /**
     * @param int $mMaxDamage
     */
    public function setMMaxDamage($mMaxDamage)
    {
        $this->mMaxDamage = $mMaxDamage;
    }

    /**
     * @return int
     */
    public function getPDef()
    {
        return $this->pDef;
    }

    /**
     * @param int $pDef
     */
    public function setPDef($pDef)
    {
        $this->pDef = $pDef;
    }

    /**
     * @return int
     */
    public function getMDef()
    {
        return $this->mDef;
    }

    /**
     * @param int $mDef
     */
    public function setMDef($mDef)
    {
        $this->mDef = $mDef;
    }

    /**
     * @return int
     */
    public function getPShield()
    {
        return $this->pShield;
    }

    /**
     * @param int $pShield
     */
    public function setPShield($pShield)
    {
        $this->pShield = $pShield;
    }

    /**
     * @return int
     */
    public function getMShield()
    {
        return $this->mShield;
    }

    /**
     * @param int $mShield
     */
    public function setMShield($mShield)
    {
        $this->mShield = $mShield;
    }

    /**
     * @return int
     */
    public function getPBias()
    {
        return $this->pBias;
    }

    /**
     * @param int $pBias
     */
    public function setPBias($pBias)
    {
        $this->pBias = $pBias;
    }

    /**
     * @return int
     */
    public function getMBias()
    {
        return $this->mBias;
    }

    /**
     * @param int $mBias
     */
    public function setMBias($mBias)
    {
        $this->mBias = $mBias;
    }

    /**
     * @return int
     */
    public function getPCrit()
    {
        return $this->pCrit;
    }

    /**
     * @param int $pCrit
     */
    public function setPCrit($pCrit)
    {
        $this->pCrit = $pCrit;
    }

    /**
     * @return int
     */
    public function getMCrit()
    {
        return $this->mCrit;
    }

    /**
     * @param int $mCrit
     */
    public function setMCrit($mCrit)
    {
        $this->mCrit = $mCrit;
    }
} 