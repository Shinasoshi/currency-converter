<?php

namespace AppBundle\Model\Api;

class ExchangeRatesSeries
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var array
     */
    protected $rates;

    /**
     * @return int
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param int $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param array $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
    }
}