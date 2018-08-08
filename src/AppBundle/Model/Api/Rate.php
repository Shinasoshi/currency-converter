<?php

namespace AppBundle\Model\Api;

class Rate
{
    /**
     * @var string
     */
    protected $no;

    /**
     * @var \DateTime
     */
    protected $effectiveDate;

    /**
     * @var float
     */
    protected $mid;

    /**
     * @return string
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param string $no
     */
    public function setNo($no)
    {
        $this->no = $no;
    }

    /**
     * @return \DateTime
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @param \DateTime $effectiveDate
     */
    public function setEffectiveDate($effectiveDate)
    {
        $this->effectiveDate = $effectiveDate;
    }

    /**
     * @return float
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param float $mid
     */
    public function setMid($mid)
    {
        $this->mid = $mid;
    }
}