<?php

namespace AppBundle\Model;

class Main
{
    private $rubValue;
    private $zlotyValue;

    /**
     * @return float
     */
    public function getRubValue()
    {
        return $this->rubValue;
    }

    /**
     * @param float $rubValue
     */
    public function setRubValue($rubValue)
    {
        $this->rubValue = $rubValue;
    }

    /**
     * @return float
     */
    public function getZlotyValue()
    {
        return $this->zlotyValue;
    }

    /**
     * @param float $zlotyValue
     */
    public function setZlotyValue($zlotyValue)
    {
        $this->zlotyValue = $zlotyValue;
    }
}