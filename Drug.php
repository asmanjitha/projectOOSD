<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/30/2017
 * Time: 7:07 AM
 */
class Drug
{
    var $serial_number;
    var $drug_name;
    var $type;
    var $description;
    var $deleted;
    var $batches;

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
    public function getDrugName()
    {
        return $this->drug_name;
    }

    /**
     * @param mixed $drug_name
     */
    public function setDrugName($drug_name)
    {
        $this->drug_name = $drug_name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

    /**
     * @return mixed
     */
    public function getBatches()
    {
        return $this->batches;
    }

    /**
     * @param mixed $batches
     */
    public function setBatches($batches)
    {
        $this->batches = $batches;
    }



}