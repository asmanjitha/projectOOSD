<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/30/2017
 * Time: 7:33 AM
 */
class DrugBatch
{
    var $serial_number;
    var $arrival;
    var $expire;
    var $arrival_amount;
    var $inventory_balance;
    var $dispensary_balance;
    var $other_balance;
    var $total_balance;
    var $inventory_alert_level;
    var $dispensary_alert_level;
    var $status;
    var $deleted;

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serial_number;
    }

    /**
     * @param mixed $serial_number
     */
    public function setSerialNumber($serial_number)
    {
        $this->serial_number = $serial_number;
    }

    /**
     * @return mixed
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param mixed $arrival
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }

    /**
     * @return mixed
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * @param mixed $expire
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    /**
     * @return mixed
     */
    public function getArrivalAmount()
    {
        return $this->arrival_amount;
    }

    /**
     * @param mixed $arrival_amount
     */
    public function setArrivalAmount($arrival_amount)
    {
        $this->arrival_amount = $arrival_amount;
    }

    /**
     * @return mixed
     */
    public function getInventoryBalance()
    {
        return $this->inventory_balance;
    }

    /**
     * @param mixed $inventory_balance
     */
    public function setInventoryBalance($inventory_balance)
    {
        $this->inventory_balance = $inventory_balance;
    }

    /**
     * @return mixed
     */
    public function getDispensaryBalance()
    {
        return $this->dispensary_balance;
    }

    /**
     * @param mixed $dispensary_balance
     */
    public function setDispensaryBalance($dispensary_balance)
    {
        $this->dispensary_balance = $dispensary_balance;
    }

    /**
     * @return mixed
     */
    public function getOtherBalance()
    {
        return $this->other_balance;
    }

    /**
     * @param mixed $other_balance
     */
    public function setOtherBalance($other_balance)
    {
        $this->other_balance = $other_balance;
    }

    /**
     * @return mixed
     */
    public function getTotalBalance()
    {
        return $this->total_balance;
    }

    /**
     * @param mixed $total_balance
     */
    public function setTotalBalance($total_balance)
    {
        $this->total_balance = $total_balance;
    }

    /**
     * @return mixed
     */
    public function getInventoryAlertLevel()
    {
        return $this->inventory_alert_level;
    }

    /**
     * @param mixed $inventory_alert_level
     */
    public function setInventoryAlertLevel($inventory_alert_level)
    {
        $this->inventory_alert_level = $inventory_alert_level;
    }

    /**
     * @return mixed
     */
    public function getDispensaryAlertLevel()
    {
        return $this->dispensary_alert_level;
    }

    /**
     * @param mixed $dispensary_alert_level
     */
    public function setDispensaryAlertLevel($dispensary_alert_level)
    {
        $this->dispensary_alert_level = $dispensary_alert_level;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }



}