<?php

namespace Ampersand\Stores\Model;

use Magento\Framework\Model\AbstractModel;
use Ampersand\Stores\Api\Data\StoreInterface;

class Store extends AbstractModel implements StoreInterface
{
    protected function _construct()
    {
        $this->_init('Ampersand\Stores\Model\ResourceModel\Store');
    }

    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getAddressLine1()
    {
        return $this->getData(self::ADDRESS_LINE_1);
    }

    public function setAddressLine1($addressLine_1)
    {
        return $this->setData(self::ADDRESS_LINE_1, $addressLine_1);
    }

    public function getAddressLine2()
    {
        return $this->getData(self::ADDRESS_LINE_2);
    }

    public function setAddressLine2($addressLine_2)
    {
        return $this->setData(self::ADDRESS_LINE_2, $addressLine_2);
    }

    public function getPostcode()
    {
        return $this->getData(self::POSTCODE);
    }

    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }

    public function setLatitude($latitude)
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }

    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    public function getOpening()
    {
        return $this->getData(self::OPENING);
    }

    public function setOpening($opening)
    {
        return $this->setData(self::OPENING, $opening);
    }

    public function getClosing()
    {
        return $this->getData(self::CLOSING);
    }

    public function setClosing($closing)
    {
        return $this->setData(self::CLOSING, $closing);
    }
}
